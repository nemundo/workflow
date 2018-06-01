<?php

namespace Nemundo\Workflow\WorkflowStatus;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\DateTime\Date;
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
    public $workflowStatus;

    /**
     * @var string
     */
    public $workflowStatusId;

    /**
     * @var string
     */
    public $actionLabel;

    /**
     * @var AbstractModel
     */
    public $modelClassName;

    /**
     * @var WorkflowItem
     */
    public $workflowItemClassName;

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

        $update = new WorkflowUpdate();
        $update->subject = $subject;
        $update->updateById($this->workflowId);

    }


    protected function changeDeadline(Date $deadline)
    {

        $update = new WorkflowUpdate();
        $update->deadline = $deadline;
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


    public function runWorkflow($workflowId, $workflowItemId = null)
    {

        if (is_null($workflowId)) {
            LogMessage::writeError('Run Workflow: No Workflow Id');
            exit;
        }

        // alte draft löschen


        $this->workflowId = $workflowId;
        $this->workflowItemId = $workflowItemId;

        // Status Change
        $data = new WorkflowStatusChange();
        $data->workflowStatusId = $this->workflowStatusId;
        $data->workflowId = $workflowId;
        $data->workflowItemId = $workflowItemId;

        $draft = $this->draftMode;
        $data->draft = $draft;
        $data->save();


        // Workflow
        $update = new WorkflowUpdate();

        if ($this->changeWorkflowStatus) {
            $update->workflowStatusId = $this->workflowStatusId;
        }

        if ($this->closingWorkflow) {
            $update->closed = true;
        }

        $update->draft = $draft;

        $update->updateById($workflowId);


        $this->onChange($workflowId, $workflowItemId);

    }


    protected function onChange($workflowId, $workflowItemId = null)
    {

    }

}