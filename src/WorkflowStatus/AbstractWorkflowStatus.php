<?php

namespace Nemundo\Workflow\WorkflowStatus;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Design\Bootstrap\Form\BootstrapForm;
use Nemundo\Design\ResponsiveMail\ResponsiveActionMailMessage;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\User\Access\UserAccessTrait;
use Nemundo\User\Data\User\UserReader;
use Nemundo\User\Usergroup\AbstractUsergroup;
use Nemundo\Web\Action\AbstractActionPanel;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Action\DeadlineAction;
use Nemundo\Workflow\Action\UserAssignmentAction;
use Nemundo\Workflow\Action\WorkflowSubject;
use Nemundo\Workflow\Com\Item\AbstractWorkflowItem;
use Nemundo\Workflow\Com\Item\DataWorkflowItem;
use Nemundo\Workflow\Data\UserAssignment\UserAssignment;
use Nemundo\Workflow\Data\UserAssignment\UserAssignmentDelete;
use Nemundo\Workflow\Data\UsergroupAssignment\UsergroupAssignment;
use Nemundo\Workflow\Data\UsergroupAssignment\UsergroupAssignmentDelete;
use Nemundo\Workflow\Data\UserNotification\UserNotification;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Data\Workflow\WorkflowUpdate;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChange;
use Nemundo\Workflow\Com\Item\WorkflowItem;
use Nemundo\Workflow\Notification\WorkflowNotification;
use Nemundo\Workflow\Search\SearchIndexBuilder;


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
    public $workflowStatusText;

    /**
     * @var string
     */
    public $actionLabel;

    /**
     * @var AbstractModel
     */
    //public $modelClassName;

    /**
     * @var AbstractWorkflowItem
     */
    public $workflowItemClassName;  // = ModelWorkflowItem::class;

    /**
     * @var BootstrapForm
     */
    //public $formClassName;

    /**
     * @var AbstractActionPanel
     */
    public $actionPanelClassName;


    /**
     * @var AbstractSite
     */
    //public $formSite;

    /**
     * @var bool
     */
    public $draftMode = false;

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
    //public $notificationMessage = '';

    /**
     * @var string
     */
    public $workflowId;

    /**
     * @var string
     */
    public $statusChangeId;

    /**
     * @var string
     */
    protected $workflowItemId;

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

        (new WorkflowSubject($this->workflowId))
            ->changeSubject($subject);

        /*
        $update = new WorkflowUpdate();
        $update->subject = $subject;
        $update->updateById($this->workflowId);

        $this->addSearch($subject);*/

    }


    protected function changeDeadline(Date $deadline)
    {

        (new DeadlineAction($this->workflowId))
            ->changeDeadline($deadline);


      /*  $update = new WorkflowUpdate();
        $update->deadline = $deadline;
        $update->updateById($this->workflowId);*/

    }


    protected function addFollowingStatusClassName($statusClassName)
    {
        $this->followingStatusClassList[] = $statusClassName;
    }


    protected function assignUsergroup(AbstractUsergroup $usergroup, $sendMail = false)
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


    protected function assignUser($userId, $sendMail = false)
    {

        (new UserAssignmentAction($this->workflowId))
            ->assignUser($userId);


        /*
        $data = new UserAssignment();
        $data->workflowId = $this->workflowId;
        $data->userId = $userId;
        $data->save();

        if ($sendMail) {
            $this->sendMail($userId);
        }

        $this->notificateUser($userId);*/

    }


    protected function clearUserAssignment()
    {

        $delete = new UserAssignmentDelete();
        $delete->filter->andEqual($delete->model->workflowId, $this->workflowId);
        $delete->delete();

    }


    protected function clearUsergroupUserAssignment()
    {
        $this->clearUsergroupAssignment();
        $this->clearUserAssignment();
    }


    protected function notificateUser($userId, $sendMail = false)
    {

        $notification = new WorkflowNotification();
        $notification->statusChangeId = $this->statusChangeId;
        $notification->userId = $userId;
        $notification->sendMail = $sendMail;
        $notification->createNotification();

    }


    protected function notificateUsergroup(AbstractUsergroup $usergroup, $sendMail = false)
    {

        foreach ($usergroup->getUserList() as $userRow) {
            $this->notificateUser($userRow->id, $sendMail);
        }

    }


    protected function notificateCreator()
    {

        $workflowRow = (new WorkflowReader())->getRowById($this->workflowId);
        $this->notificateUser($workflowRow->userId);

    }


    protected function sendMail($userId)
    {


        // Class WorkflowMail

        $userRow = (new UserReader())->getRowById($userId);

        $workflowReader = new WorkflowReader();
        $workflowReader->model->loadProcess();
        $workflowRow = $workflowReader->getRowById($this->workflowId);

        $process = $workflowRow->process->getProcessClassObject();

        // WorkflowView aus baseModel


        $mail = new ResponsiveActionMailMessage();
        $mail->addTo($userRow->email);
        $mail->subject = $workflowRow->workflowNumber . ': ' . $workflowRow->subject;
        $mail->actionText = $this->workflowStatusText;
        $mail->actionUrlSite = $process->getApplicationSite($this->workflowId);
        $mail->sendMail();


    }


    protected function addSearch($text)
    {


        $searchIndex = new SearchIndexBuilder();
        //$searchIndex->process = $this->process;
        $searchIndex->workflowId = $this->workflowId;
        $searchIndex->addText($text);


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



    /*
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
        $statusChangeId = $data->save();


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


        $this->statusChangeId = $statusChangeId;

        $this->onChange($workflowId, $workflowItemId);


        return $statusChangeId;

    }*/


    public function onChange($workflowId, $workflowItemId = null)
    {

    }

}