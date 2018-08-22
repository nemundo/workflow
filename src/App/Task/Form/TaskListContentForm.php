<?php

namespace Nemundo\Workflow\App\Task\Form;


use Nemundo\App\Content\Form\AbstractContentHtmlContainerList;
use Nemundo\Package\Bootstrap\Layout\BootstrapColumn;
use Nemundo\Package\Bootstrap\Layout\BootstrapRow;
use Nemundo\Workflow\App\Task\Data\Task\TaskTable;
use Nemundo\Workflow\App\Workflow\Data\StatusChange\StatusChangeValue;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowReader;


class TaskListContentForm extends AbstractContentHtmlContainerList
{


    public function getHtml()
    {

        $dataId = $this->getDataId();

        $value = new StatusChangeValue();
        $value->field = $value->model->workflowId;
        $value->filter->andEqual($value->model->dataId, $dataId);
        $workflowId = $value->getValue();

        $workflowRow = (new WorkflowReader())->getRowById($workflowId);


        $row = new BootstrapRow($this);

        $colLeft = new BootstrapColumn($row);
        $colLeft->columnWidth = 6;

        $colRight = new BootstrapColumn($row);
        $colRight->columnWidth = 6;


        $form = new TaskBuilderForm($colLeft);
        $form->source = $workflowRow->subject;
        $form->sourceId = $dataId;

        $table = new TaskTable($colRight);
        $table->filter->andEqual($table->model->sourceId, $dataId);

        return parent::getHtml();

    }

}