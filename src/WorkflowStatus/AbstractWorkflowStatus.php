<?php

namespace Nemundo\Workflow\WorkflowStatus;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\User\Access\UserAccessTrait;
use Nemundo\Web\Action\AbstractActionPanel;
use Nemundo\Workflow\Builder\StatusChangeEvent;
use Nemundo\Workflow\Com\Item\AbstractWorkflowItemView;


abstract class AbstractWorkflowStatus extends AbstractBaseClass
{

    use UserAccessTrait;

    /**
     * @var string
     */
    public $workflowStatus;

    /**
     * @var string
     */
    public $workflowStatusId;

    /**
     * @var
     */
    protected $workflowStatusText;

    /**
     * @var string
     */
    public $actionLabel;

    /**
     * @var AbstractWorkflowItemView
     */
    public $workflowItemViewClassName;
// viewClassName

    public $notificationViewClass;


    /**
     * @var AbstractActionPanel
     */
    public $actionPanelClassName;

    /**
     * @var bool
     */
    //public $draftMode = false;

    /**
     * @var bool
     */
    public $closingWorkflow = false;
// closeWorkflow

    /**
     * @var bool
     */
    public $changeWorkflowStatus = true;

    /**
     * @var string
     */
    public $changeContainerClass;

    /**
     * @var string
     */
    public $startContainerClass;

    /**
     * @var AbstractWorkflowStatus[]
     */
    private $followingStatusClassList = [];


    abstract protected function loadWorkflowStatus();


    public function __construct()
    {
        $this->loadWorkflowStatus();
    }


    protected function addFollowingStatusClassName($statusClassName)
    {
        $this->followingStatusClassList[] = $statusClassName;
    }



    //public function getFollowingStatusClassList(ChangeEvent $event)

    /**
     * @return AbstractWorkflowStatus[]
     */
    public function getFollowingStatusClassList($workflowId = null)
    {

        $list = [];
        foreach ($this->followingStatusClassList as $className) {
            $list[] = new $className();
        }

        return $list;
    }



    // getStatusText(ChangeEvent $event)
    // getMessage
    public function getStatusText(StatusChangeEvent $changeEvent) {

        return $this->workflowStatusText;

    }



    public function onChange(StatusChangeEvent $changeEvent)
    {

    }

}