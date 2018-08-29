<?php

namespace Nemundo\Workflow\App\Task\Form;


use Nemundo\App\Content\Form\AbstractContentHtmlContainerList;
use Nemundo\Core\Debug\Debug;
use Nemundo\Package\Bootstrap\Layout\BootstrapColumn;
use Nemundo\Package\Bootstrap\Layout\BootstrapRow;
use Nemundo\Workflow\App\Task\Data\SourceTask\SourceTaskForm;
use Nemundo\Workflow\App\Task\Data\SourceTask\SourceTaskTable;
use Nemundo\Workflow\App\Task\Data\Task\TaskTable;
use Nemundo\Workflow\App\Task\Table\SourceTaskContentTable;
use Nemundo\Workflow\App\Task\Table\TaskContentTable;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowItem;
use Nemundo\Workflow\App\Workflow\Com\Button\DraftReleaseButton;
use Nemundo\Workflow\App\Workflow\Data\StatusChange\StatusChangeValue;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowReader;
use Schleuniger\App\ChangeOrder\Process\ChangeOrderProcess;


class SourceTaskContentForm extends AbstractContentHtmlContainerList
{


    public function getHtml()
    {

        $dataId = $this->getDataId();

        $value = new StatusChangeValue();
        $value->field = $value->model->workflowId;
        $value->filter->andEqual($value->model->dataId, $dataId);
        $workflowId = $value->getValue();

        //$workflowRow = (new WorkflowReader())->getRowById($workflowId);

        $workflowItem = new WorkflowItem($workflowId);


        $row = new BootstrapRow($this);

        $colLeft = new BootstrapColumn($row);
        $colLeft->columnWidth = 6;

        $colRight = new BootstrapColumn($row);
        $colRight->columnWidth = 6;


        $form = new SourceTaskForm($colLeft);
        $form->model->dataId->defaultValue = $dataId;
        $form->model->source->defaultValue = $workflowItem->getSubject();

        $table = new SourceTaskContentTable($colRight);
        $table->dataId = $dataId;

        $btn = new DraftReleaseButton($colLeft);
        $btn->workflowId = $workflowId;


        return parent::getHtml();

    }

}