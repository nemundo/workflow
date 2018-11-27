<?php

namespace Nemundo\Workflow\App\Message\Data\MessageDocument;
class MessageDocumentListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox
{
    /**
     * @var MessageDocumentModel
     */
    public $model;

    protected function loadCom()
    {
        parent::loadCom();
        $this->model = new MessageDocumentModel();
        $this->label = $this->model->label;
    }
}