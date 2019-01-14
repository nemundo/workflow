<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;


use Nemundo\Workflow\App\Workflow\Content\Form\StatusChangeForm;
use Schleuniger\App\Task\Content\Type\Process\TaskProcess;

abstract class AbstractStatusChangeWorkflowStaus extends AbstractWorkflowStatus
{

    /**
     * @var TaskProcess
     */
    public $parentContentType;

    public function __construct($dataId = null)
    {

        $this->formClass = StatusChangeForm::class;
        parent::__construct($dataId);

    }

}