<?php

namespace Nemundo\Workflow\App\Workflow\Form\Start;


use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowBuilder;
use Nemundo\Workflow\App\Workflow\Process\AbstractProcess;

class AbstractWorkflowStartForm extends BootstrapForm
{

    use WorkflowStartFormTrait;


}