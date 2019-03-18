<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;


use Nemundo\Workflow\App\Workflow\Content\Form\StatusChangeForm;
use Nemundo\Workflow\App\Workflow\Content\Process\AbstractWorkflowProcess;
use Schleuniger\App\Task\Content\Type\Process\TaskProcess;

abstract class AbstractStatusChangeWorkflowStaus extends AbstractWorkflowStatus
{

    /**
     * @var AbstractWorkflowProcess
     */
    public $parentContentType;

    public function __construct($dataId = null)
    {

        $this->formClass = StatusChangeForm::class;
        parent::__construct($dataId);

    }

}