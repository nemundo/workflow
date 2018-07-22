<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;

use Nemundo\User\Access\UserAccessTrait;
use Nemundo\Web\Action\AbstractActionPanel;
use Nemundo\Workflow\App\Workflow\Builder\StatusChangeEvent;
use Nemundo\Workflow\App\Workflow\Content\Item\AbstractWorkflowItemView;
use Nemundo\App\Content\Type\AbstractContentType;

// WorkflowContentType
abstract class AbstractWorkflowStatus extends AbstractContentType
{

    use UserAccessTrait;

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
    public $itemClass;

    /**
     * @var AbstractActionPanel
     */
    public $actionPanelClassName;

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


    protected function addFollowingStatusClassName($statusClassName)
    {
        $this->followingStatusClassList[] = $statusClassName;
    }


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


    // getSubject()
    public function getStatusText(StatusChangeEvent $changeEvent)
    {

        $statusText = $this->workflowStatusText;

        if ($statusText == null) {
            $statusText = $this->name;
        }

        if ($statusText == null) {
            $statusText = '-';
        }

        return $statusText;

    }


    public function onChange(StatusChangeEvent $changeEvent)
    {

    }


    public function onWorkflowCreate($dataId, $workflowId) {

    }

}