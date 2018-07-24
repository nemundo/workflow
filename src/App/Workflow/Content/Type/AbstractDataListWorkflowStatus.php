<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;


use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Workflow\App\Workflow\Com\Form\DataListForm;
use Nemundo\Workflow\App\Workflow\Content\Item\DataListWorkflowItemView;
use Nemundo\Workflow\App\Workflow\Container\Change\DataListWorkflowChangeContainer;
use Nemundo\Workflow\App\Workflow\Container\Start\DataListWorkflowStartContainer;

abstract class AbstractDataListWorkflowStatus extends AbstractWorkflowStatus
{

    /**
     * @var AbstractModel
     */
    public $modelListClass;

    public function __construct()
    {

        $this->itemClass = DataListWorkflowItemView::class;
        $this->startContainerClass = DataListWorkflowStartContainer::class;
        $this->changeContainerClass = DataListWorkflowChangeContainer::class;

        parent::__construct();

    }



    public function getForm($parentItem = null)
    {

        $form = new DataListForm($parentItem);
        $form->workflowStatus = $this;


        return $form;






    }


}