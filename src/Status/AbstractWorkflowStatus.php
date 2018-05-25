<?php

namespace Nemundo\Workflow\Status;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\User\Access\UserAccessTrait;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Data\Workflow\WorkflowUpdate;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChange;
use Nemundo\Workflow\Com\WorkflowItem;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Schleuniger\Com\Form\DraftParameter;

// Schleuniger\App\Status\AbstractWorkflowStatus

abstract class AbstractWorkflowStatus extends AbstractBaseClass
{

    use UserAccessTrait;

    /**
     * @var string
     */
    public $statusId;

    /**
     * @var string
     */
    public $statusLabel;

    /**
     * @var string
     */
    public $actionLabel;

    /**
     * @var AbstractModel
     */
    public $modelClassName;
    // model

    /**
     * @var WorkflowItem
     */
    public $workflowItemClassName;
// workflowItemClasName

    /**
     * @var AbstractSite
     */
    public $formSite;

    /**
     * @var bool
     */
    public $draftMode = false;

    /**
     * @var bool
     */
    public $closingWorkflow = false;

    /**
     * @var AbstractUrlParameter
     */
    //public $parameter;

    /**
     * @var bool
     */
    public $changeWorkflowStatus = true;

    /**
     * @var string
     */
    public $notificationMessage = '';

    /**
     * @var string
     */
    public $workflowId;
// nur protected ???


    /**
     * @var string
     */
    public $workflowItemId;

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


    /**
     * @return AbstractWorkflowStatus[]
     */
    public function getFollowingStatusClassList()
    {

        $list = [];

        foreach ($this->followingStatusClassList as $className) {
            $list[] = new $className();
        }

        return $list;
    }


    public function runWorkflow($workflowId, $workflowItemId = null)  //, $draft = false)
    {

        if (is_null($workflowId)) {
            LogMessage::writeError('Run Workflow: No Workflow Id');
            exit;
        }

        // alte draft löschen


        $this->workflowId = $workflowId;
        $this->workflowItemId = $workflowItemId;


        $update = new WorkflowUpdate();
        $update->workflowStatusId = $this->statusId;
        $update->updateById($this->workflowId);

        // Status Change
        $data = new WorkflowStatusChange();
        $data->workflowStatusId = $this->statusId;
        $data->workflowId = $workflowId;
        $data->workflowItemId = $workflowItemId;

        $draft = $this->draftMode;
        $draftParameter = new DraftParameter();
        if ($draftParameter->exists()) {
            $draft = true;
        }

        $data->draft = $draft;
        $data->save();


        // Workflow
        $update = new WorkflowUpdate();
        $update->workflowStatusId = $this->statusId;
        //$update->filter->andEqual($update->model->dataId, $workflowId);

        // Close

        //(new Debug())->write('count'.sizeof($this->followingStatusClassList));

        //if (sizeof($this->followingStatusClassList) == 0) {
        if ($this->closingWorkflow) {
            $update->closed = true;
        }

        // Draft
        if ($draftParameter->exists()) {
            $draft = true;
        }

        $update->draft = $draft;

        $update->updateById($workflowId);


        $this->onChange($workflowId, $workflowItemId);

    }


    protected function onChange($workflowId, $workflowItemId = null)
    {

    }

}