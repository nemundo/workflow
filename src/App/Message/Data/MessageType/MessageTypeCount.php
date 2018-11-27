<?php

namespace Nemundo\Workflow\App\Message\Data\MessageType;
class MessageTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount
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