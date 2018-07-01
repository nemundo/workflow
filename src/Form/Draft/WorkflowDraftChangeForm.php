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
use Nemundo\Workflow\Form\Change\WorkflowChangeFormTrait;
use Nemundo\Workflow\Parameter\DraftEditParameter;
use Nemundo\Workflow\Parameter\DraftParameter;


class WorkflowDraftChangeForm extends AbstractWorkflowDraftForm
{


    use WorkflowChangeFormTrait;

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

        //if (!$this->isDraft()) {

            $itemId = $this->saveData();

            (new Debug())->write('pre');

            (new Debug())->write('pre'.$itemId);
            (new Debug())->write('workflow id'.$this->workflowId);

            $builder = new WorkflowStatusChangeBuilder();
            $builder->workflowId = $this->workflowId;
            $builder->workflowItemId = $itemId;
            $builder->workflowStatus = $this->workflowStatus;
            $builder->draft = true;  //$this->getDraft();
            $builder->changeStatus();


            (new Debug())->write('pre');
            //exit;


        } else {

            $this->updateData($draftEditParameter->getValue());

        }


    }

}