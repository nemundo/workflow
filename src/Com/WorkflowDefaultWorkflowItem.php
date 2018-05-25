<?php

namespace Nemundo\Workflow\Com;


use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\View\ModelView;

class WorkflowDefaultWorkflowItem extends WorkflowItem
{

    /**
     * @var AbstractModel
     */
    public $model;

    public function getHtml()
    {

        if ($this->model !== null) {
            $view = new WorkflowModelView($this);
            $view->model = $this->model;
            $view->dataId = $this->workflowItemId;

            /*
            $view->labelCellWidth = 300;
            $view->smallTable = true;
            $view->border = 0;
            $view->cssClass = '';*/
        }

        return parent::getHtml();
    }

}