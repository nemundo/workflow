<?php

namespace Nemundo\Workflow\Com\Item;


use Nemundo\Core\Debug\Debug;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Workflow\Model\AbstractWorkflowBaseModel;


class DataListWorkflowItemView extends AbstractWorkflowItemView
{


    public function getHtml()
    {


        $model = $this->contentType->getModel();

        /** @var AbstractWorkflowBaseModel $model */
        //$model = (new ModelFactory())->getModelByClassName($this->workflowStatus->modelListClass);


        $model->workflow->visible->table = false;

        $table = new BootstrapModelTable($this);
        $table->model = $model;
        //$table->filter->andEqual($model->workflowId, $this->workflowId);

        //(new Debug())->write('workflowid' . $this->workflowId);
        //(new Debug())->write('dataid' . $this->dataId);
        //(new Debug())->write('dataid' . $this->);
        //(new Debug())->write($this->contentType);


        return parent::getHtml();

    }

}