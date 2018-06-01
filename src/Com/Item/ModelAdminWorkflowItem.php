<?php

namespace Nemundo\Workflow\Com\Item;


use Nemundo\Model\Admin\ModelAdmin;
use Nemundo\Workflow\Model\AbstractWorkflowBaseModel;

class ModelAdminWorkflowItem extends ModelAdmin
{

    use WorkflowItemTrait;

    /**
     * @var AbstractWorkflowBaseModel
     */
    public $model;


    public function getHtml()
    {

        $this->model->workflowId->defaultValue = $this->workflowId;
        $this->filter->andEqual($this->model->workflowId, $this->workflowId);

        return parent::getHtml();

    }


}