<?php

namespace Nemundo\Workflow\App\Task\Table;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Workflow\App\Task\Data\Task\TaskReader;
use Nemundo\Workflow\App\Task\Parameter\TaskParameter;
use Nemundo\Workflow\App\Task\Site\TaskItemSite;

class TaskContentTable extends AdminClickableTable
{

    /**
     * @var string
     */
    public $dataId;

    public function getHtml()
    {

        $taskReader = new TaskReader();
        $taskReader->model->loadUserCreated();
        $taskReader->model->loadIdentificationType();
        $taskReader->filter->andEqual($taskReader->model->dataId, $this->dataId);

        $header = new TableHeader($this);
        $header->addText($taskReader->model->archive->label);
        $header->addText($taskReader->model->task->label);

        $header->addText($taskReader->model->identificationId->label);


        $header->addText($taskReader->model->deadline->label);
        $header->addText($taskReader->model->timeEffort->label);
        $header->addText($taskReader->model->userCreated->label);

        foreach ($taskReader->getData() as $taskRow) {

            $row = new BootstrapClickableTableRow($this);
            $row->addYesNo($taskRow->archive);
            $row->addText($taskRow->task);

            $identitifactionType = $taskRow->identificationType->getIdentificationTypeClassObject();
            $row->addText($identitifactionType->getValue($taskRow->identificationId));

            $row->addText($taskRow->deadline->getShortDateLeadingZeroFormat());
            $row->addText($taskRow->timeEffort);
            $row->addText($taskRow->userCreated->displayName . ' ' . $taskRow->dateTimeCreated->getShortDateLeadingZeroFormat());

            $site = clone(TaskItemSite::$site);
            $site->addParameter(new TaskParameter($taskRow->id));
            $row->addClickableSite($site);

        }

        return parent::getHtml();

    }

}