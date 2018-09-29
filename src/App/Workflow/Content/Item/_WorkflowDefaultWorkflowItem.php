<?php

namespace Nemundo\Workflow\App\Workflow\Content\Item;


use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Workflow\Com\View\WorkflowModelView;

class WorkflowDefaultWorkflowItem //extends //WorkflowItem
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
            $view->dataId = $this->dataId;

        }

        return parent::getHtml();

    }

}