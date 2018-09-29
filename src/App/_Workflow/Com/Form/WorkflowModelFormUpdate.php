<?php

namespace Nemundo\Workflow\App\Workflow\Com\Form;


use Nemundo\Db\Base\ConnectionTrait;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Model\Data\ModelData;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Form\Item\AbstractModelFormItem;
use Nemundo\Model\Reader\ModelDataReader;

class WorkflowModelFormUpdate extends BootstrapForm
{

    use ConnectionTrait;

    /**
     * @var AbstractModel
     */
    public $model;

    /**
     * @var string
     */
    public $updateId;


    public function __construct($parentCom = null)
    {
        parent::__construct($parentCom);

        $this->loadConnection();

        /*
        $this->submitButton = new SubmitButton();

        $this->submitButton->content = 'Speichern';
        $this->submitButton->addCssClass('btn btn-primary');*/


    }


    public function getHtml()
    {

       // $this->submitButton->content = 'Speichern';


        $reader = new ModelDataReader();
        $reader->connection = $this->connection;
        $reader->model = $this->model;
        $reader->addFieldByModel($this->model);
        $reader->checkExternal($this->model);
        $row = $reader->getRowById($this->updateId);


        $count = 0;

        foreach ($this->model->getTypeList() as $type) {

            if ($type->visible->form) {

                /** @var AbstractModelFormItem $formItem */
                $formItem = new $type->formTypeClassName($this);  //formRow);
                $formItem->connection = $this->connection;
                $formItem->row = $row;
                $formItem->loadType($type);
                $formItem->value = $type->defaultValue;

                if ($count == 0) {
                    $formItem->focus = true;
                }
                $count++;

            }

        }


        //$this->addCom($this->submitButton);

        return parent::getHtml();

    }



    protected function onSubmit()
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

        $id = $data->save();


        // save multi document
        foreach ($this->model->getTypeList() as $type) {

            if ($type->visible->form) {

                /** @var AbstractModelFormItem $text */
                $text = new $type->formTypeClassName($this);
                $text->visible = false;
                $text->loadType($type);
                $text->typeValueList = $data->typeValueList;
                $text->afterSave($id);

            }
        }

        $this->afterSubmitEvent->run($id);

        return $id;

    }


}