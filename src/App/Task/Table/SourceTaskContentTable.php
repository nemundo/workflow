<?php

namespace Nemundo\Workflow\App\Task\Table;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Workflow\App\Task\Data\SourceTask\SourceTaskReader;
use Nemundo\Workflow\App\Task\Data\Task\TaskReader;
use Nemundo\Workflow\App\Task\Parameter\TaskParameter;
use Nemundo\Workflow\App\Task\Process\SourceTaskProcess;
use Nemundo\Workflow\App\Task\Site\TaskItemSite;

class SourceTaskContentTable extends AdminClickableTable
{

    /**
     * @var string
     */
    public $dataId;

    public function getHtml()
    {

        $taskReader = new SourceTaskReader();
        $taskReader->model->loadResponsibleUser();
        $taskReader->model->workflow->loadUser();
        //$taskReader->model->loadUserCreated();
        //$taskReader->model->loadIdentificationType();
        $taskReader->filter->andEqual($taskReader->model->dataId, $this->dataId);

        $header = new TableHeader($this);
        $header->addText($taskReader->model->done->label);
        $header->addText($taskReader->model->task->label);
        $header->addText($taskReader->model->responsibleUser->label);
        $header->addText($taskReader->model->deadline->label);
        $header->addText($taskReader->model->timeEffort->label);
        $header->addText($taskReader->model->workflow->user->label);

        foreach ($taskReader->getData() as $taskRow) {

            $row = new BootstrapClickableTableRow($this);
            $row->addYesNo($taskRow->done);
            $row->addText($taskRow->task);

            //$identitifactionType = $taskRow->identificationType->getIdentificationTypeClassObject();
            //$row->addText($identitifactionType->getValue($taskRow->identificationId));

            $row->addText($taskRow->responsibleUser->displayName);

            if ($taskRow->deadline !== null) {
                $row->addText($taskRow->deadline->getShortDateLeadingZeroFormat());
            } else {
                $row->addEmpty();
            }

            $row->addText($taskRow->timeEffort);
            $row->addText($taskRow->workflow->user->displayName . ' ' . $taskRow->workflow->dateTime->getShortDateLeadingZeroFormat());

            /*$site = clone(TaskItemSite::$site);
            $site->addParameter(new TaskParameter($taskRow->id));
            $row->addClickableSite($site);*/

            $row->addClickableSite((new SourceTaskProcess())->getItemSite($taskRow->id));

        }

        return parent::getHtml();

    }

}