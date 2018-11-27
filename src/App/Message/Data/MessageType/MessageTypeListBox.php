<?php

namespace Nemundo\Workflow\App\Message\Data\MessageType;
class MessageTypeListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox
{
    /**
     * @var MessageTypeModel
     */
    public $model;

    protected function loadCom()
    {
        parent::loadCom();
        $this->model = new MessageTypeModel();
        $this->label = $this->model->label;
    }
}