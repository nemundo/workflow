<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;

use Nemundo\App\Content\Type\AbstractDataContentType;
use Nemundo\App\Content\Type\Sequence\MultiSequenceTrait;
use Nemundo\User\Access\UserAccessTrait;
use Nemundo\Web\Action\AbstractActionPanel;
use Nemundo\Workflow\App\Workflow\Builder\StatusChangeEvent;
use Nemundo\Workflow\App\Workflow\Content\Item\AbstractWorkflowItemView;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Workflow\App\Workflow\Form\WorkflowContentForm;


trait WorkflowStatusTrait
{

    use UserAccessTrait;

    use WorkflowIdTrait;

    use MultiSequenceTrait;

    /**
     * @var
     */
    protected $workflowStatusText;

    /**
     * @var bool
     */
    protected $createWorkflowEvent = true;


    /**
     * @var string
     */
    //public $workflowId;


    /**
     * @var string
     */
    public $actionLabel;

    /**
     * @var AbstractWorkflowItemView
     */
    //public $itemClass;

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
     * @var AbstractWorkflowStatus[]
     */
   // private $followingStatusClassList = [];


    /*
    public function getForm($parentItem = null)
    {

        /** @var WorkflowContentForm $form */
      /*  $form = parent::getForm($parentItem);

        if ($form->isObjectOfClass(WorkflowContentForm::class)) {
            $form->workflowId = $this->workflowId;
        }

        return $form;

    }

    //abstract public function getForm($parentItem = null);



/*
    protected function addFollowingContentTypeClass($statusClassName)
    {
        $this->followingStatusClassList[] = $statusClassName;
    }


    /**
     * @return AbstractWorkflowStatus[]
     */
  /*  public function getFollowingStatusClassList($workflowId = null)
    {

        $list = [];
        foreach ($this->followingStatusClassList as $className) {
            $list[] = new $className();
        }

        return $list;
    }*/



}