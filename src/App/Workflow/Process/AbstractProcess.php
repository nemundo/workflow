<?php

namespace Nemundo\Workflow\App\Workflow\Process;

use Nemundo\User\Access\UserAccessTrait;
use Nemundo\Web\Http\Parameter\AbstractUrlParameter;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Workflow\Container\Start\WorkflowStartContainer;
use Nemundo\Workflow\App\Workflow\ContentItem\WorkflowContentItem;
use Nemundo\App\Content\Type\AbstractDataContentType;
use Nemundo\Workflow\App\Workflow\Form\Start\WorkflowStartForm;
use Nemundo\Workflow\Parameter\WorkflowParameter;
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
     * @var AbstractUrlParameter
     */
    //public $parameter;

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


    public function __construct()
    {

        $this->itemSite = WorkflowItemSite::$site;

        //$this->processItemClassName = WorkflowViewList::class;

        $this->itemClass = WorkflowContentItem::class;

        $this->parameterClass = WorkflowParameter::class;

        parent::__construct();

    }


    public function getForm($parentItem = null)
    {

        //$container = new WorkflowStartContainer($parentItem);
        //$container->process = $this;
        //return $container;


        $form = new WorkflowStartForm($parentItem);
        $form->process = $this;
        return $form;


    }


}