<?php

namespace Nemundo\Workflow\App\Workflow\Com\Title;


use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\H1;
use Nemundo\Com\Html\Hyperlink\Hyperlink;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Core\Debug\Debug;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowItem;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;


// WorkflowHeader
class WorkflowTitle extends AbstractHtmlContainerList
{

    /**
     * @var string
     */
    public $workflowId;


    public function getHtml()
    {

        $workflowItem = new WorkflowItem($this->workflowId);


        $workflowReader = new WorkflowReader();
        $workflowReader->model->loadWorkflowStatus();
        //$workflowReader->model->loadIdentificationType();
        $workflowReader->model->loadUser();
        $workflowReader->model->loadUserModified();
        $workflowReader->model->loadProcess();
        $workflowRow = $workflowReader->getRowById($this->workflowId);

        $process = $workflowRow->process->getProcessClassObject();
        $contentType = $workflowRow->workflowStatus->getContentTypeClassObject();

        $subtitle = new AdminSubtitle($this);
        $subtitle->content = $process->objectName;

        $workflowTitle = $workflowRow->subject;

        if ($workflowRow->workflowNumber !== '') {
            $workflowTitle = $workflowRow->workflowNumber . ': ' . $workflowTitle;
        }

        if ($workflowRow->draft) {
            $workflowTitle .= ' (Entwurf)';
        }


        $title = new AdminTitle($this);
        $title->content = $workflowTitle;

        $link = new Hyperlink($this);
        $link->content = 'Zum Workflow';
        $link->site = $process->getItemSite($this->workflowId);
        //clone($process->site);
        //$link->site->addParameter(new WorkflowParameter($this->workflowId));*/

        $table = new AdminLabelValueTable($this);

        if ($workflowRow->deadline !== null) {
            $table->addLabelValue('Erledigen bis', $workflowRow->deadline->getShortDateLeadingZeroFormat());
        }

        $table->addLabelValue('Ersteller', $workflowRow->user->displayName . ' ' . $workflowRow->dateTime->getShortDateTimeLeadingZeroFormat());
        $table->addLabelValue('Letzte Änderung', $workflowRow->userModified->displayName . ' ' . $workflowRow->dateTimeModified->getShortDateTimeLeadingZeroFormat());
        $table->addLabelValue('Status', $workflowRow->workflowStatus->contentType);
        $table->addLabelValue('Subject', $process->getSubject($workflowRow->id));

        /*
        $identificationType = $workflowRow->identificationType->getIdentificationTypeClassObject();
        $verantwortlicher = '';
        if ($identificationType !== null) {
            $verantwortlicher = $identificationType->getValue($workflowRow->identificationId);
        }*/

        $table->addLabelValue('Verantwortlicher', $workflowRow->assignment->getValue());

        //$table->addLabelValue('Status', $workflowItem->getStatus());
        //$table->addLabelValue('Status Text', $workflowRow->workflowStatus->workflowStatusText);


        return parent::getHtml();

    }

}