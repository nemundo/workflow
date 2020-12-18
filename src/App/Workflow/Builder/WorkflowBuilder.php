<?php

namespace Nemundo\Workflow\App\Workflow\Builder;


use Nemundo\Workflow\App\Workflow\Content\Process\AbstractWorkflowProcess;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\User\Type\UserSession;
use Nemundo\Workflow\App\Workflow\Data\Workflow\Workflow;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowUpdate;

class WorkflowBuilder extends AbstractBaseClass  // AbstractContentBuilder
{

    /**
     * @var AbstractWorkflowProcess
     */
    protected $process;

    public function __construct(AbstractWorkflowProcess $process)
    {
        $this->process = $process;
    }



    // closed

    // process

    // status

    // assignTo ???

    // deadline???

    // workflow number

    // datetime created

    // user created


    public function createWorkflow()
    {

        $data = new Workflow();
        $data->processId = $this->process->contentId;
        $data->userCreatedId = (new UserSession())->userId;
        $data->dateTimeCreated = (new DateTime())->setNow();
        $data->dataId = $this->process->dataId;
        $data->save();

    }


    public function closeWorkflow() {


        $update = new WorkflowUpdate();
        $update->closed = true;
        $update->filter->andEqual($update->model->dataId, $this->process->dataId);
        $update->update();
    }

}