<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;


use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Workflow\App\Workflow\Content\Item\DataWorkflowItemView;
use Nemundo\Workflow\App\Workflow\Container\Change\FormWorkflowChangeContainer;
use Nemundo\Workflow\App\Workflow\Container\Start\FormWorkflowStartContainer;

abstract class AbstractFormWorkflowStatus extends AbstractWorkflowStatus
{

    /**
     * @var BootstrapForm
     */
    //public $formClass;

    /**
     * @var AbstractModel
     */
    //public $modelClass;


    public function __construct()
    {

        $this->viewClass = DataWorkflowItemView::class;

        //$this->startContainerClass = FormWorkflowStartContainer::class;
        //$this->changeContainerClass = FormWorkflowChangeContainer::class;

        parent::__construct();

    }

}