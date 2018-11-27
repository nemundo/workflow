<?php

namespace Nemundo\Workflow\App\Message\Data\MessageItem;
class MessageItemListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox
{
    /**
     * @var MessageItemModel
     */
    public $model;

    protected function loadCom()
    {
        parent::loadCom();
        $this->model = new MessageItemModel();
        $this->label = $this->model->label;
    }
}