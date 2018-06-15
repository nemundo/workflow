<?php

namespace Nemundo\Workflow\WorkflowStatus;


use Nemundo\Design\Bootstrap\Form\BootstrapForm;
use Nemundo\Workflow\Container\Change\FormWorkflowChangeContainer;
use Nemundo\Workflow\Container\Start\FormWorkflowStartContainer;

abstract class AbstractFormWorkflowStatus extends AbstractWorkflowStatus
{

    /**
     * @var BootstrapForm
     */
    public $formClassName;


    public function __construct()
    {

        $this->startContainerClass = FormWorkflowStartContainer::class;
        $this->changeContainerClass = FormWorkflowChangeContainer::class;

        parent::__construct();

    }

}