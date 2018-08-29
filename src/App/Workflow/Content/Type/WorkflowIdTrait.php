<?php


namespace Nemundo\Workflow\App\Workflow\Content\Type;


use Nemundo\Core\Debug\Debug;
use Nemundo\User\Usergroup\AbstractUsergroup;
use Nemundo\Workflow\App\Inbox\Builder\InboxBuilder;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Workflow\App\Identification\Type\UsergroupIdentificationType;
use Nemundo\Workflow\App\Identification\Type\UserIdentificationType;
use Nemundo\Workflow\App\Task\Builder\TaskBuilder;
use Nemundo\Workflow\App\Task\Data\Task\TaskUpdate;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowUpdate;
use Nemundo\Workflow\App\Workflow\Process\AbstractProcess;


trait WorkflowIdTrait
{

    /**
     * @var string
     */
    public $workflowId;

    /**
     * @var AbstractProcess
     */
    private $process;

    protected function changeSubject($subject)
    {

        $update = new WorkflowUpdate();
        $update->subject = $subject;
        $update->updateById($this->workflowId);

    }


    protected function changeProcessSubject()
    {

        //(new Debug())->write('wor'.$this->workflowId);

        $process = $this->getProcess();
        $subject = $process->getSubject($this->workflowId);
        $this->changeSubject($subject);

    }


    protected function changeDeadline(Date $deadline = null)
    {

        if ($deadline !== null) {
            $update = new WorkflowUpdate();
            $update->deadline = $deadline;
            $update->updateById($this->workflowId);
        }

    }


    protected function createUserInbox($userId)  //, $message = '')
    {

        $workflowReader = new WorkflowReader();
        $workflowReader->model->loadProcess();
        $workflowRow = $workflowReader->getRowById($this->workflowId);

        $process = $workflowRow->process->getProcessClassObject();

        $builder = new InboxBuilder();
        $builder->contentType = $process;
        $builder->dataId = $this->workflowId;
        $builder->subject = $process->getSubject($this->workflowId);
        //$builder->message = $this->getStatusText($this->dataId);  // $message;
        $builder->createUserInbox($userId);

    }


    protected function createUsergroupInbox(AbstractUsergroup $usergroup, $message = '')
    {

        $workflowReader = new WorkflowReader();
        $workflowReader->model->loadProcess();
        $workflowRow = $workflowReader->getRowById($this->workflowId);

        $process = $workflowRow->process->getProcessClassObject();

        $builder = new InboxBuilder();
        $builder->contentType = $process;
        $builder->dataId = $this->workflowId;
        $builder->subject = $process->getSubject($this->workflowId);
        $builder->message = $message;
        $builder->createUsergroupInbox($usergroup);


    }


    protected function assignUsergroup(AbstractUsergroup $usergroup)
    {

        $update = new WorkflowUpdate();
        $update->identificationTypeId = (new UsergroupIdentificationType())->id;
        $update->identificationId = $usergroup->id;
        $update->updateById($this->workflowId);

        $this->createUsergroupInbox($usergroup);

    }


    protected function assignUser($userId)
    {

        $update = new WorkflowUpdate();
        $update->identificationTypeId = (new UserIdentificationType())->id;
        $update->identificationId = $userId;
        $update->updateById($this->workflowId);

        //$this->createUserInbox($userId);

    }


    protected function clearAssignment()
    {

        $update = new WorkflowUpdate();
        $update->identificationTypeId = '';
        $update->identificationId = '';
        $update->updateById($this->workflowId);

    }


    protected function createUserTask($userId, Date $deadline = null)
    {

        $process = $this->getProcess();

        $builder = new TaskBuilder();
        $builder->contentType = $process;
        $builder->dataId = $this->workflowId;
        $builder->source = $process->getSubject($this->workflowId);
        $builder->task = $this->name;
        $builder->deadline = $deadline;
        $builder->createUserTask($userId);

        $this->assignUser($userId);
        $this->changeDeadline($deadline);


    }


    protected function createUsergroupTask(AbstractUsergroup $usergroup, Date $deadline = null, $task = '')
    {

        /*
        $process = $this->getProcess();

        $builder = new TaskBuilder();
        $builder->contentType = $process;
        $builder->dataId = $this->workflowId;

        $builder->source = $process->getSubject($this->workflowId);
        $builder->sourceId = $this->workflowId;

        $builder->task = $task;  // $this->actionLabel;
        $builder->deadline = $deadline;
        $builder->createUsergroupTask($usergroup);*/


        $this->assignUsergroup($usergroup);
        $this->changeDeadline($deadline);

    }



    protected function archiveTask()
    {

        $update = new TaskUpdate();
        $update->archive = true;
        //$update->filter->andEqual($update->model->contentTypeId, (new Task))
        $update->filter->andEqual($update->model->dataId, $this->workflowId);
        $update->update();

        $this->clearAssignment();

    }


    protected function getProcess()
    {

        if ($this->process == null) {

            $workflowReader = new WorkflowReader();
            $workflowReader->model->loadProcess();
            $workflowRow = $workflowReader->getRowById($this->workflowId);

            $this->process = $workflowRow->process->getProcessClassObject();
        }


        return $this->process;

    }


    public function closeWorkflow()
    {

        $update = new WorkflowUpdate();
        $update->closed = true;
        $update->updateById($this->workflowId);

    }


    public function reopenWorkflow()
    {

        $update = new WorkflowUpdate();
        $update->closed = false;
        $update->updateById($this->workflowId);

    }


}