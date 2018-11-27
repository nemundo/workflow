<?php

namespace Nemundo\Workflow\App\Message\Data\MessageType;
class MessageTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue
{
    /**
     * @var MessageTypeModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new MessageTypeModel();
    }
}