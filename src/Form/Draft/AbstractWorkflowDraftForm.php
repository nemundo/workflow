<?php

namespace Nemundo\Workflow\Form\Draft;


use Nemundo\Com\Html\Form\AbstractSubmitForm;
use Nemundo\Core\Debug\Debug;
use Nemundo\Db\Base\ConnectionTrait;
use Nemundo\Design\Bootstrap\Form\BootstrapModelForm;
use Nemundo\Design\Bootstrap\FormElement\BootstrapSubmitButton;
use Nemundo\Model\Data\ModelData;
use Nemundo\Model\Data\ModelUpdate;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Model\Form\Item\AbstractModelFormItem;
use Nemundo\Model\Reader\ModelDataReader;
use Nemundo\Workflow\Builder\DraftRelease;
use Nemundo\Workflow\Builder\WorkflowStatusChangeBuilder;
use Nemundo\Workflow\Form\WorkflowFormTrait;
use Nemundo\Workflow\Parameter\DraftEditParameter;
use Nemundo\Workflow\Parameter\DraftParameter;


abstract class AbstractWorkflowDraftForm extends AbstractSubmitForm
{

    use ConnectionTrait;


    /**
     * @var AbstractModel
     */
    private $model;

    /**
     * @var string
     */
    public $dataId;

    /**
     * @var string
     */
    //public $workflowItemId;

    public function getHtml()
    {

        $draftEditParamter = new DraftEditParameter();

        $this->loadConnection();

        $this->model = (new ModelFactory())->getModelByClassName($this->workflowStatus->modelClassName);
        $count = 0;

        $row = null;
        if ($draftEditParamter->exists()) {
            $reader = new ModelDataReader();
            $reader->connection = $this->connection;
            $reader->model = $this->model;
            $reader->addFieldByModel($this->model);
            $reader->checkExternal($this->model);
            $row = $reader->getRowById($draftEditParamter->getValue());
        }

        foreach ($this->model->getTypeList() as $type) {

            if ($type->visible->form) {

                /** @var AbstractModelFormItem $formItem */
                $formItem = new $type->formTypeClassName($this);
                $formItem->connection = $this->connection;
                $formItem->loadType($type);
                $formItem->value = $type->defaultValue;

                if ($draftEditParamter->exists()) {
                    $formItem->row = $row;
                }


                if ($count == 0) {
                    $formItem->focus = true;
                }
                $count++;

            }

        }

        $btn = new BootstrapSubmitButton($this);
        $btn->name = (new DraftParameter())->getParameterName();
        $btn->content = 'Entwurf speichern';

        $submitButton = new BootstrapSubmitButton($this);
        $submitButton->name = 'save_btn';
        $submitButton->content = 'Freigeben';
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


    protected function saveData()
    {

        $data = new ModelData();
        $data->model = $this->model;
        $data->connection = $this->connection;

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

        return $itemId;

    }


    protected function updateData($workflowItemId)
    {

        $update = new ModelUpdate();
        $update->model = $this->model;
        $update->connection = $this->connection;

        foreach ($this->model->getTypeList() as $type) {

            if ($type->visible->form) {

                /** @var AbstractModelFormItem $text */
                $text = new $type->formTypeClassName($this);
                $text->visible = false;
                $text->loadType($type);
                $text->typeValueList = $update->typeValueList;
                $text->saveValue();

            }

        }

        $update->updateById($workflowItemId);

        if (!$this->getDraft()) {
            (new DraftRelease())->releaseDraft($this->workflowId);
        }

        return $workflowItemId;

    }

}