<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;

use Nemundo\App\Content\Type\Sequence\MultiSequenceTrait;
use Nemundo\User\Access\UserAccessTrait;
use Nemundo\Web\Action\AbstractActionPanel;


trait WorkflowStatusTrait
{

    use UserAccessTrait;

    use WorkflowIdTrait;

    use MultiSequenceTrait;

    /**
     * @var
     */
    protected $workflowStatusText;

    /**
     * @var bool
     */
    protected $createWorkflowEvent = true;

    /**
     * @var string
     */
    public $actionLabel;

    /**
     * @var AbstractActionPanel
     */
    public $actionPanelClassName;

    /**
     * @var bool
     */
    public $closingWorkflow = false;

    /**
     * @var bool
     */
    public $changeWorkflowStatus = true;

}