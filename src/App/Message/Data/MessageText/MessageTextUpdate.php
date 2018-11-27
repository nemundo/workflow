<?php

namespace Nemundo\Workflow\App\Message\Data\MessageText;

use Nemundo\Model\Data\AbstractModelUpdate;

class MessageTextUpdate extends AbstractModelUpdate
{
    /**
     * @var MessageTextModel
     */
    public $model;

    /**
     * @var string
     */
    public $text;

    public function __construct()
    {
        parent::__construct();
        $this->model = new MessageTextModel();
    }

    public function update()
    {
        $this->typeValueList->setModelValue($this->model->text, $this->text);
        parent::update();
    }
}