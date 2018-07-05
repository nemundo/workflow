<?php

namespace Nemundo\Workflow\App\Workflow\Process;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\User\Access\UserAccessTrait;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Workflow\ContentItem\WorkflowContentItem;
use Nemundo\Workflow\Com\View\WorkflowViewList;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\App\Content\Type\AbstractDataContentType;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Site\Item\WorkflowItemSite;


abstract class AbstractProcess extends AbstractDataContentType  // AbstractBaseClass
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
    //public $modelClass;

    /**
     * @var string
     */
    public $startWorkflowStatusClassName;

    /**
     * @var bool
     */
    public $createWorkflowNumber = true;


    //abstract protected function loadType();

    public function __construct()
    {

        $this->itemSite = WorkflowItemSite::$site;

        //$this->processItemClassName = WorkflowViewList::class;

        $this->itemClass = WorkflowContentItem::class;

        $this->parameter = new WorkflowParameter();

        parent::__construct();

        //$this->loadType();
    }


    /*
    public function getItemSite($workflowId = null)
    {

        $site = clone($this->itemSite);
        $site->addParameter($this->parameter->setValue($workflowId));

        return $site;

    }*/


}