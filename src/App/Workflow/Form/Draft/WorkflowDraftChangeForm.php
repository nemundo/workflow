<?php

namespace Nemundo\Workflow\App\Workflow\Form\Draft;


use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Workflow\App\Workflow\Form\Change\WorkflowChangeFormTrait;
use Nemundo\Workflow\App\Workflow\Parameter\DraftEditParameter;


class WorkflowDraftChangeForm extends AbstractWorkflowDraftForm
{

    use WorkflowChangeFormTrait;

    /**
     * @var AbstractModel
     */
    //private $model;

    /**
     * @var string
     */
    public $dataId;


    protected function onSubmit()
    {

        $draftEditParameter = new DraftEditParameter();

        if (!$draftEditParameter->exists()) {

            $itemId = $this->saveData();

            /*
            $builder = new StatusChangeBuilder();
            $builder->workflowId = $this->workflowId;
            $builder->dataId = $itemId;
            $builder->workflowStatus = $this->workflowStatus;
            $builder->draft = $this->isDraft();
            $builder->changeStatus();*/


        } else {

            //$this->updateData($draftEditParameter->getValue());
            $this->updateData($this->dataId);
        }

    }

}