<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;

use Nemundo\App\Content\Type\AbstractDataContentType;
use Nemundo\User\Access\UserAccessTrait;
use Nemundo\Web\Action\AbstractActionPanel;
use Nemundo\Workflow\App\Workflow\Builder\StatusChangeEvent;
use Nemundo\Workflow\App\Workflow\Content\Item\AbstractWorkflowViewView;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Workflow\App\Workflow\Form\WorkflowContentForm;


// WorkflowContentType
abstract class AbstractWorkflowStatusOld extends AbstractDataContentType
{

    use UserAccessTrait;

    use WorkflowIdTrait;

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
     * @var AbstractWorkflowViewView
     */
    public $viewClass;

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
    //public $changeContainerClass;

    /**
     * @var string
     */
    //public $startContainerClass;

    /**
     * @var AbstractWorkflowStatus[]
     */
    private $followingStatusClassList = [];


    public function getForm($parentItem = null)
    {

        /** @var WorkflowContentForm $form */
        $form = parent::getForm($parentItem);

        if ($form->isObjectOfClass(WorkflowContentForm::class)) {
            $form->workflowId = $this->workflowId;
        }

        return $form;

    }

    //abstract public function getForm($parentItem = null);


    protected function addFollowingContentTypeClass($statusClassName)
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
 /*   public function getStatusText(StatusChangeEvent $changeEvent)
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



    /*
    public function onChange(StatusChangeEvent $changeEvent)
    {

    }


    // change to onCreate($dataId)
    public function onWorkflowCreate($dataId, $workflowId)
    {

    }*/


    // alles unter WorkflowIdTrait



}