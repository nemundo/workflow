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
use Nemundo\Workflow\Builder\WorkflowBuilder;
use Nemundo\Workflow\Builder\WorkflowStatusChangeBuilder;
use Nemundo\Workflow\Factory\WorkflowStatusFactory;
use Nemundo\Workflow\Parameter\DraftParameter;
use Nemundo\Workflow\Parameter\WorkflowParameter;


class WorkflowDraftStartForm extends AbstractWorkflowDraftForm
{

    /**
     * @var AbstractModel
     */
    private $model;

    /**
     * @var string
     */
    public $dataId;


    public function getHtml()
    {

        $this->workflowStatus = (new WorkflowStatusFactory())->getWorkflowStatus($this->process->startWorkflowStatusClassName);
        $this->model = (new ModelFactory())->getModelByClassName($this->workflowStatus->modelClassName);

        return parent::getHtml();
    }


    protected function onSubmit()
    {

        $itemId = $this->saveData();

        $builder = new WorkflowBuilder();
        $builder->contentType = $this->process;
        $builder->workflowItemId = $itemId;
        $builder->draft = $this->isDraft();
        $workflowId = $builder->createItem();

        if ($this->appendWorkflowParameter) {
            $this->redirectSite->addParameter(new WorkflowParameter($workflowId));
        }

    }

}