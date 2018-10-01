<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;


use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Workflow\App\Workflow\Content\Item\DataWorkflowItemView;
use Nemundo\Workflow\App\Workflow\Container\Change\DraftDataWorkflowChangeContainer;
use Nemundo\Workflow\App\Workflow\Container\Start\DraftDataWorkflowStartContainer;
use Nemundo\Workflow\App\Workflow\Form\Draft\WorkflowDraftChangeForm;


// AbstractDraftDataModelWorkflowStatus
abstract class AbstractDraftDataWorkflowStatus extends AbstractModelDataWorkflowStatus  // AbstractWorkflowStatus
{

    /**
     * @var AbstractModel
     */
    //public $modelClass;


    public function __construct()
    {

        //$this->itemClass = DataWorkflowItemView::class;
        //$this->startContainerClass = DraftDataWorkflowStartContainer::class;
        //$this->changeContainerClass = DraftDataWorkflowChangeContainer::class;

        parent::__construct();

    }


    public function getForm($parentItem = null)
    {

        $form = new WorkflowDraftChangeForm($parentItem);
        $form->workflowId = $this->workflowId;
        $form->model = $this->getModel();
        $form->workflowStatus = $this;
        $form->dataId = (new DataIdParameter())->getValue();

        return $form;


    }


}
