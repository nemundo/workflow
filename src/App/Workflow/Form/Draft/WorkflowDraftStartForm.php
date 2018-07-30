<?php

namespace Nemundo\Workflow\App\Workflow\Form\Draft;


use Nemundo\Com\Html\Form\AbstractSubmitForm;
use Nemundo\Core\Debug\Debug;
use Nemundo\Db\Base\ConnectionTrait;
use Nemundo\Package\Bootstrap\Form\BootstrapModelForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapSubmitButton;
use Nemundo\Model\Data\ModelData;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Model\Form\Item\AbstractModelFormItem;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowBuilder;
use Nemundo\Workflow\App\Workflow\Builder\StatusChangeBuilder;
use Nemundo\Workflow\Factory\WorkflowStatusFactory;
use Nemundo\Workflow\App\Workflow\Parameter\DraftParameter;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;


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
        $this->model = (new ModelFactory())->getModelByClassName($this->workflowStatus->modelClass);

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