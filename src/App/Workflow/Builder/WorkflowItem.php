<?php

namespace Nemundo\Workflow\App\Workflow\Builder;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Workflow\Action\UserAssignmentAction;
use Nemundo\Workflow\App\Workflow\Content\Type\WorkflowIdTrait;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowRow;
use Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;

class WorkflowItem extends AbstractBase
{

    use WorkflowIdTrait;

    /**
     * @var string
     */
    /*public $workflowNumber;

    /**
     * @var string
     */
    //public $subject;

    /**
     * @var AbstractWorkflowStatus
     */
    //public $workflowStatus;

    /**
     * @var string
     */
    //private $workflowId;

    /**
     * @var WorkflowRow
     */
    private $workflowRow;

    public function __construct($workflowId)
    {

        $this->workflowId = $workflowId;


        $reader = new WorkflowReader();
        $reader->model->loadProcess();
        $reader->model->loadWorkflowStatus();
        $this->workflowRow = $reader->getRowById($workflowId);

        /*
        $this->workflowNumber = $this->workflowRow->workflowNumber;
        $this->subject = $this->workflowRow->subject;
        $this->workflowStatus = $this->workflowRow->workflowStatus->getContentTypeClassObject();*/

    }



    public function fromDataId($dataId) {

    }


    public function fromWorkflowId($workflowId) {


    }



    public function getSubject()
    {

//        $workflowRow = (new WorkflowReader())->getRowById($this->workflowId);

      /*  $reader = new WorkflowReader();
        $reader->model->loadProcess();
        $workflowRow = $reader->getRowById($this->workflowId);*/

        $process = $this->workflowRow->process->getProcessClassObject();
        $subject = $process->getSubject($this->workflowId);

        return $subject;


    }


    public function getWorkflowNumber()
    {

        $workflowNumber = $this->workflowRow->workflowNumber;
        return $workflowNumber;

    }


    public function getProcess()
    {

        /*$reader = new WorkflowReader();
        $reader->model->loadProcess();
        $workflowRow = $reader->getRowById($this->workflowId);*/

        $process = $this->workflowRow->process->getProcessClassObject();

        return $process;


    }


    public function getTitle()
    {

        $title = $this->getWorkflowNumber() . ' ' . $this->getSubject();

        /*
                $title = $this->subject;

                if ($this->workflowNumber !== null) {
                    $title = $this->workflowNumber . ': ' . $this->subject;
                }*/

        return $title;

    }

    public function getDataId()
    {

        $row = (new WorkflowReader())->getRowById($this->workflowId);
        return $row->dataId;

    }


    public function getStatus()
    {

        $status = $this->workflowStatus->name;

        if ($this->isDraft()) {
            $status .= ' (Entwurf)';
        }

        return $status;
    }


    public function isDraft()
    {

        return $this->workflowRow->draft;

    }


    public function assignUser($userId)
    {

        (new UserAssignmentAction($this->workflowId))
            ->assignUser($userId);

    }


    public function getUserAssign()
    {


    }


    /**
     * @return AbstractWorkflowStatus[]
     */
    /*public function getFollowingStatus()
    {

        $list = [];

        foreach ($this->workflowStatus->getFollowingStatusClassList() as $className) {

            /** @var AbstractWorkflowStatus $status */
    /*         $status = new $className();

             $list[] = $status;

         }


         return $list;


     }


     /**
      * @return \Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeRow[]
      */
    /* public function getStatusChange()
     {

         $changeReader = new WorkflowStatusChangeReader();
         $changeReader->model->loadWorkflowStatus();
         $changeReader->model->loadUser();
         $changeReader->filter->andEqual($changeReader->model->workflowId, $this->workflowId);
         $changeReader->addOrder($changeReader->model->itemOrder);

         return $changeReader->getData();

     }


     public function getLastWorkflowItemId()
     {

         $changeReader = new WorkflowStatusChangeReader();
         $changeReader->filter->andEqual($changeReader->model->workflowId, $this->workflowId);
         $changeReader->addOrder($changeReader->model->itemOrder, SortOrder::DESCENDING);
         $row = $changeReader->getRow();

         return $row->dataId;


     }*/


}