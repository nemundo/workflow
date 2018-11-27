<?php

namespace Nemundo\Workflow\App\Message\Data\MessageText;
class MessageTextValue extends \Nemundo\Model\Value\AbstractModelDataValue
{
    /**
     * @var MessageTextModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new MessageTextModel();
    }
}