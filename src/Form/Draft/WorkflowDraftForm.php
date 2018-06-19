<?php

namespace Nemundo\Workflow\Form\Draft;


use Nemundo\Com\Html\Form\AbstractSubmitForm;
use Nemundo\Core\Debug\Debug;
use Nemundo\Db\Base\ConnectionTrait;
use Nemundo\Design\Bootstrap\Form\BootstrapModelForm;
use Nemundo\Design\Bootstrap\FormElement\BootstrapSubmitButton;
use Nemundo\Model\Data\ModelData;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Model\Form\Item\AbstractModelFormItem;
use Nemundo\Workflow\Builder\WorkflowStatusChangeBuilder;
use Nemundo\Workflow\Parameter\DraftEditParameter;
use Nemundo\Workflow\Parameter\DraftParameter;


class WorkflowDraftForm extends AbstractWorkflowDraftForm
{


    /**
     * @var AbstractModel
     */
    private $model;

    /**
     * @var string
     */
    public $dataId;


    protected function onSubmit()
    {

        $draftEditParameter = new DraftEditParameter();

        if (!$draftEditParameter->exists()) {

            $itemId = $this->saveData();

            $builder = new WorkflowStatusChangeBuilder();
            $builder->workflowId = $this->workflowId;
            $builder->workflowItemId = $itemId;
            $builder->workflowStatus = $this->workflowStatus;
            $builder->draft = $this->getDraft();
            $builder->changeStatus();

        } else {

            $this->updateData($draftEditParameter->getValue());

        }


    }

}