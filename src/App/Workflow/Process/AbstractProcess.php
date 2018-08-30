<?php

namespace Nemundo\Workflow\App\Workflow\Process;

use Nemundo\App\Content\Collection\AbstractContentTypeCollection;
use Nemundo\App\Content\Collection\ContentTypeCollection;
use Nemundo\User\Access\UserAccessTrait;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\App\Workflow\Event\WorkflowStartEvent;
use Nemundo\Workflow\App\Workflow\Process\Item\ProcessContentItem;
use Nemundo\App\Content\Type\AbstractDataContentType;
use Nemundo\Workflow\App\Workflow\Site\WorkflowItemSite;
use Nemundo\Workflow\App\Workflow\Factory\WorkflowStatusFactory;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;


abstract class AbstractProcess extends AbstractDataContentType
{

    use UserAccessTrait;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $description;

    /**
     * @var AbstractSite
     */
    public $itemSite;

    /**
     * @var string
     */
    public $processItemClassName;

    /**
     * @var string
     */
    public $prefix = '';

    /**
     * @var int
     */
    public $startNumber = 1000;

    /**
     * @var string
     */
    public $startWorkflowStatusClass;

    /**
     * @var bool
     */
    public $createWorkflowNumber = true;

    /**
     * @var string
     */
    public $workflowId;


    /**
     * @var AbstractContentTypeCollection
     */
    public $processMenu;



    public function __construct()
    {

        $this->itemSite = WorkflowItemSite::$site;
        $this->itemClass = ProcessContentItem::class;
        $this->parameterClass = WorkflowParameter::class;

        $this->processMenu =new ContentTypeCollection();

        $this->loadData();

        //parent::__construct();

    }


    public function getForm($parentItem = null)
    {

        //$workflowStatus = (new WorkflowStatusFactory())->getWorkflowStatus($this->startWorkflowStatusClass);
        $workflowStatus = $this->getStartWorkflowStatus();

        //$event = new WorkflowStartEvent();
        //$event->process = $this;

        $form = $workflowStatus->getForm($parentItem);
        //$form->afterSubmitEvent->addEvent($event);

        return $form;

    }


    public function getStartWorkflowStatus()
    {


        $workflowStatus = (new WorkflowStatusFactory())->getWorkflowStatus($this->startWorkflowStatusClass);
        return $workflowStatus;

    }


    public function getSubject($dataId)
    {

        $row = (new WorkflowReader())->getRowById($dataId);
        $subject = $row->workflowNumber . ' ' . $row->subject;
        return $subject;

    }


    public function getSource($dataId)
    {

        $source = $this->name;
        return $source;


    }


}