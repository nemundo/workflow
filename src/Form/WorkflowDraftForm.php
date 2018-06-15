<?php

namespace Nemundo\Workflow\Form;


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
use Nemundo\Workflow\Parameter\DraftParameter;


class WorkflowDraftForm extends AbstractSubmitForm
{

    use ConnectionTrait;

    use WorkflowFormTrait;

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

        $this->loadConnection();

        $this->model = (new ModelFactory())->getModelByClassName($this->workflowStatus->modelClassName);

        foreach ($this->model->getTypeList() as $type) {

            if ($type->visible->form) {

                /** @var AbstractModelFormItem $formItem */
                $formItem = new $type->formTypeClassName($this);
                $formItem->connection = $this->connection;
                $formItem->loadType($type);
                $formItem->value = $type->defaultValue;

            }

        }

        $btn = new BootstrapSubmitButton($this);
        $btn->name = (new DraftParameter())->getParameterName();
        $btn->content = 'Entwurf';

        $submitButton = new BootstrapSubmitButton($this);
        $submitButton->name = 'save_btn';
        $submitButton->content = 'Speichern';
        $submitButton->addCssClass('btn btn-primary');


        return parent::getHtml();

    }


    protected function getDraft()
    {

        $draft = false;
        $draftParameter = new DraftParameter();

        if ($draftParameter->exists()) {
            $draft = true;
        }

        return $draft;

    }


    protected function onValidate()
    {

        $draftParameter = new DraftParameter();

        if ($draftParameter->exists()) {
            return true;
        }

        return parent::onValidate();

    }


    protected function onSubmit()
    {

        $data = new ModelData();
        $data->model = $this->model;
        $data->connection = $this->connection;

        //$data->typeValueList->setModelValue($this->model->id, $this->dataId);
        //$data->typeValueList->setModelValue($this->model->draft, 1);

        foreach ($this->model->getTypeList() as $type) {

            if ($type->visible->form) {

                /** @var AbstractModelFormItem $text */
                $text = new $type->formTypeClassName($this);
                $text->visible = false;
                $text->loadType($type);
                $text->typeValueList = $data->typeValueList;
                $text->saveValue();

            } else {

                if ($type->defaultValue !== null) {
                    $data->typeValueList->setModelValue($type, $type->defaultValue);
                }

            }
        }

        $itemId = $data->save();

        $builder = new WorkflowStatusChangeBuilder();
        $builder->workflowId = $this->workflowId;
        $builder->workflowItemId = $itemId;
        $builder->workflowStatus = $this->workflowStatus;
        $builder->draft = $this->getDraft();
        $builder->changeStatus();

    }

}