<?php

namespace Nemundo\Workflow\App\Workflow\Com\Table;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Package\Bootstrap\Breadcrumb\BootstrapBreadcrumb;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Workflow\App\Task\Data\Task\TaskReader;
use Nemundo\Workflow\App\Task\Data\Task\TaskTable;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowItem;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Data\StatusChange\StatusChangeReader;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\App\Workflow\Com\Button\WorkflowActionButton;
use Nemundo\Workflow\App\Workflow\Parameter\ProcessParameter;
use Nemundo\Workflow\App\Workflow\Parameter\StatusChangeParameter;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\App\Workflow\Site\StatusChange\StatusChangeUpdateSite;
use Nemundo\Workflow\App\Workflow\Site\StatusChangeSite;


class WorkflowLogTable extends AbstractHtmlContainerList
{

    /**
     * @var string
     */
    public $workflowId;


    public function getHtml()
    {




        $title = new AdminTitle($this);
        $title->content = 'Workflow Log';

        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addText('Status');
        $header->addText('Status Text');
        $header->addText('Date/Time');
        $header->addText('User');
        $header->addText('Assign to');


        $statusChangeReader = new StatusChangeReader();
        $statusChangeReader->model->loadWorkflowStatus();
        $statusChangeReader->model->loadUser();
        $statusChangeReader->filter->andEqual($statusChangeReader->model->workflowId, $this->workflowId);
        foreach ($statusChangeReader->getData() as $statusChangeRow) {

            /** @var AbstractWorkflowStatus $workflowStatus */
            $workflowStatus = $statusChangeRow->workflowStatus->getContentTypeClassObject();

            $row = new BootstrapClickableTableRow($table);
            //$row->addText($statusChangeRow->workflowStatus->contentType);
            $row->addText($workflowStatus->getStatusText($statusChangeRow->dataId));
            $row->addText($workflowStatus->getSubject($statusChangeRow->dataId));

            $row->addText($statusChangeRow->dateTime->getShortDateTimeLeadingZeroFormat());
            $row->addText($statusChangeRow->user->displayName);
            $row->addText($statusChangeRow->assignment->getValue());


            $site = clone(StatusChangeUpdateSite::$site);
            $site->addParameter(new StatusChangeParameter($statusChangeRow->id));

            $row->addClickableSite($site);



        }





        return parent::getHtml();
    }


}