<?php

namespace Nemundo\Workflow\Status;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Design\Bootstrap\Form\BootstrapForm;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\User\Access\UserAccessTrait;
use Nemundo\User\Usergroup\AbstractUsergroup;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Builder\WorkflowSubject;
use Nemundo\Workflow\Data\UsergroupAssignment\UsergroupAssignment;
use Nemundo\Workflow\Data\UsergroupAssignment\UsergroupAssignmentDelete;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Data\Workflow\WorkflowUpdate;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChange;
use Nemundo\Workflow\Com\WorkflowItem;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Com\Form\DraftParameter;

// Nemundo\App\Status\AbstractWorkflowStatus

abstract class AbstractWorkflowStatus extends AbstractBaseClass
{

    use UserAccessTrait;


    /**
     * @var string
     */
    public $status;

    // workflowStatus
    // workflowStatusId

    /**
     * @var string
     */
    public $statusId;

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
     * @var BootstrapForm
     */
    public $formClassName;

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


    protected function changeSubject($subject)
    {

//        $subject = new WorkflowSubject($this->workflowId);
//        $subject->changeSubject($subject);

        $update = new WorkflowUpdate();
        $update->subject = $subject;
        $update->updateById($this->workflowId);


    }

    protected function addFollowingStatusClassName($statusClassName)
    {
        $this->followingStatusClassList[] = $statusClassName;
    }


    protected function assignUsergroup(AbstractUsergroup $usergroup)
    {

        $data = new UsergroupAssignment();
        $data->workflowId = $this->workflowId;
        $data->usergroupId = $usergroup->usergroupId;
        $data->save();

    }


    protected function clearUsergroupAssignment()
    {

        $delete = new UsergroupAssignmentDelete();
        $delete->filter->andEqual($delete->model->workflowId, $this->workflowId);
        $delete->delete();

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

        /*
        if ($this->changeWorkflowStatus) {
            $update = new WorkflowUpdate();
            $update->workflowStatusId = $this->statusId;
            $update->updateById($this->workflowId);
        }*/

        // Status Change
        $data = new WorkflowStatusChange();
        $data->workflowStatusId = $this->statusId;
        $data->workflowId = $workflowId;
        $data->workflowItemId = $workflowItemId;

        $draft = $this->draftMode;
        /*$draftParameter = new DraftParameter();
        if ($draftParameter->exists()) {
            $draft = true;
        }*/

        $data->draft = $draft;
        $data->save();


        // Workflow
        $update = new WorkflowUpdate();

        if ($this->changeWorkflowStatus) {
            $update->workflowStatusId = $this->statusId;
        }
        //$update->filter->andEqual($update->model->dataId, $workflowId);

        // Close

        //(new Debug())->write('count'.sizeof($this->followingStatusClassList));

        //if (sizeof($this->followingStatusClassList) == 0) {
        if ($this->closingWorkflow) {
            $update->closed = true;
        }

        // Draft
        /*if ($draftParameter->exists()) {
            $draft = true;
        }*/

        $update->draft = $draft;

        $update->updateById($workflowId);


        $this->onChange($workflowId, $workflowItemId);

    }


    protected function onChange($workflowId, $workflowItemId = null)
    {

    }

}