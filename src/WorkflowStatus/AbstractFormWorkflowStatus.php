<?php

namespace Nemundo\Workflow\WorkflowStatus;


use Nemundo\Design\Bootstrap\Form\BootstrapForm;
use Nemundo\Model\Definition\Model\AbstractModel;

abstract class AbstractFormWorkflowStatus extends AbstractWorkflowStatus
{

    /**
     * @var BootstrapForm
     */
    public $formClassName;

}