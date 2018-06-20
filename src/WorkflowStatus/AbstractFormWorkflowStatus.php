<?php

namespace Nemundo\Workflow\WorkflowStatus;


use Nemundo\Design\Bootstrap\Form\BootstrapForm;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Workflow\Com\Item\DataWorkflowItemView;
use Nemundo\Workflow\Container\Change\FormWorkflowChangeContainer;
use Nemundo\Workflow\Container\Start\FormWorkflowStartContainer;

abstract class AbstractFormWorkflowStatus extends AbstractWorkflowStatus
{

    /**
     * @var BootstrapForm
     */
    public $formClassName;

    /**
     * @var AbstractModel
     */
    public $modelClassName;


    public function __construct()
    {

        $this->workflowItemViewClassName = DataWorkflowItemView::class;

        $this->startContainerClass = FormWorkflowStartContainer::class;
        $this->changeContainerClass = FormWorkflowChangeContainer::class;

        parent::__construct();

    }

}