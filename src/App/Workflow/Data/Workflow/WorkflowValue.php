<?php

namespace Nemundo\Workflow\App\Workflow\Data\Workflow;
class WorkflowValue extends \Nemundo\Model\Value\AbstractModelDataValue
{
    /**
     * @var WorkflowModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new WorkflowModel();
    }
}