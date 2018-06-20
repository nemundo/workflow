<?php

namespace Nemundo\Workflow\Form\Change;


use Nemundo\Design\Bootstrap\Form\BootstrapForm;
use Nemundo\Workflow\Builder\WorkflowBuilder;
use Nemundo\Workflow\Form\Change\WorkflowChangeFormTrait;
use Nemundo\Workflow\Process\AbstractProcess;

class AbstractWorkflowChangeForm extends BootstrapForm
{

    use WorkflowChangeFormTrait;


}