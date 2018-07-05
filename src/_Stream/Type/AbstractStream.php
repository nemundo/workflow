<?php

namespace Nemundo\Workflow\Stream\Type;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\User\Access\UserAccessTrait;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Com\View\WorkflowViewList;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Site\Item\WorkflowItemSite;

// extends AbstractApplication
abstract class AbstractStreamType extends AbstractBaseClass
{

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
    //public $baseModelClassName;

    /**
     * @var string
     */
    public $startWorkflowStatusClassName;



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