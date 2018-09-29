<?php

namespace Nemundo\Workflow\App\Workflow\Content\Item;


use Nemundo\Model\Admin\ModelAdmin;
use Nemundo\Workflow\Model\AbstractWorkflowBaseModel;


// Form
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