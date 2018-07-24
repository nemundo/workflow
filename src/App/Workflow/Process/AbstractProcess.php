<?php

namespace Nemundo\Workflow\App\Workflow\Process;

use Nemundo\User\Access\UserAccessTrait;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Workflow\Event\WorkflowStartEvent;
use Nemundo\Workflow\App\Workflow\Process\Item\ProcessContentItem;
use Nemundo\App\Content\Type\AbstractDataContentType;
use Nemundo\Workflow\Factory\WorkflowStatusFactory;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Site\Item\WorkflowItemSite;


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

    public function __construct()
    {

        $this->itemSite = WorkflowItemSite::$site;
        $this->itemClass = ProcessContentItem::class;
        $this->parameterClass = WorkflowParameter::class;

        parent::__construct();

    }


    public function getForm($parentItem = null)
    {

        $workflowStatus = (new WorkflowStatusFactory())->getWorkflowStatus($this->startWorkflowStatusClass);

        $event = new WorkflowStartEvent();
        $event->process = $this;

        $form = $workflowStatus->getForm($parentItem);
        $form->afterSubmitEvent->addEvent($event);

        return $form;

    }

}