<?php

namespace Nemundo\Workflow\Process;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\User\Access\UserAccessTrait;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Com\View\WorkflowViewList;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Site\Item\WorkflowItemSite;


abstract class AbstractProcess extends AbstractBaseClass
{

    use UserAccessTrait;

    /**
     * @var string
     */
    public $process;

    /**
     * @var string
     */
    public $processId;

    /**
     * @var string
     */
    public $description;

    /**
     * @var AbstractSite
     */
    public $itemSite;


    // processViewClassName

    /**
     * @var string
     */
    public $processItemClassName;


    /**
     * @var AbstractUrlParameter
     */
    public $parameter;

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
    public $baseModelClassName;

    /**
     * @var string
     */
    public $startWorkflowStatusClassName;

    /**
     * @var bool
     */
    public $createWorkflowNumber = true;


    abstract protected function loadProcess();

    public function __construct()
    {
        $this->itemSite = WorkflowItemSite::$site;
        $this->processItemClassName = WorkflowViewList::class;
        $this->parameter = new WorkflowParameter();
        $this->loadProcess();
    }


    public function getItemSite($workflowId = null)
    {

        $site = clone($this->itemSite);
        $site->addParameter($this->parameter->setValue($workflowId));

        return $site;

    }


}