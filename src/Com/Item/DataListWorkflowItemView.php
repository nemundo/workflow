<?php

namespace Nemundo\Workflow\Com\Item;


use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Workflow\Model\AbstractWorkflowBaseModel;


class DataListWorkflowItemView extends AbstractWorkflowItemView
{


    public function getHtml()
    {

        /** @var AbstractWorkflowBaseModel $model */
        $model = (new ModelFactory())->getModelByClassName($this->workflowStatus->modelListClassName);
        $model->workflow->visible->table = false;

        $table = new BootstrapModelTable($this);
        $table->model = $model;
        $table->filter->andEqual($model->workflowId, $this->workflowId);

        return parent::getHtml();

    }

}