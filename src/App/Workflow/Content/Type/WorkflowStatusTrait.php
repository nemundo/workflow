<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;

use Nemundo\App\Content\Type\Sequence\MultiSequenceTrait;
use Nemundo\App\Content\Type\Sequence\SequenceTrait;
use Nemundo\Core\Debug\Debug;
use Nemundo\User\Access\UserAccessTrait;
use Nemundo\Web\Action\AbstractActionPanel;
use Nemundo\Workflow\App\Identification\Model\Identification;
use Nemundo\Workflow\App\Identification\Type\AbstractIdentificationType;
use Nemundo\Workflow\App\Subscription\Data\Subscription\SubscriptionReader;


trait WorkflowStatusTrait
{

    use UserAccessTrait;

    use WorkflowIdTrait;

    use SequenceTrait;

    use MultiSequenceTrait;

    /**
     * @var
     */
    protected $statusText;

    /**
     * @var bool
     */
    protected $createWorkflowEvent = true;

    /**
     * @var AbstractIdentificationType
     */
    //protected $assignmentIdentificationType;

    /**
     * @var Identification
     */
    protected $assignmentIdentification;


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

    /**
     * @var bool
     */
    public $draftMode = false;





    public function getStatusText($dataId)
    {


        $statusText = $this->statusText;

        if ($statusText == null) {
            $statusText = $this->name;
        }


        return $statusText;

    }



    public function getAssignmentIdentification($dataId) {


        //$identification = new Identification();
        //$identification->identificationType =

        return $this->assignmentIdentification;

    }



/*
    public function checkSubscription()
    {

        $reader = new SubscriptionReader();
        $reader->filter->andEqual($reader->model->dataId, $this->workflowId);
        foreach ($reader->getData() as $subscriptionRow) {
            $this->createUserInbox($subscriptionRow->userId);




        }

    }*/


}