<?php

namespace Nemundo\Workflow\Process;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\User\Access\UserAccessTrait;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Com\WorkflowItemList;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Site\WorkflowItemSite;


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
    public $site;
    // itemSite


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
        $this->site = WorkflowItemSite::$site;
        $this->processItemClassName = WorkflowItemList::class;
        $this->parameter = new WorkflowParameter();
        $this->loadProcess();
    }


    public function getApplicationSite($workflowId = null)
    {


        $site = clone($this->site);
        $site->addParameter($this->parameter->setValue($workflowId));

        return $site;

    }


}