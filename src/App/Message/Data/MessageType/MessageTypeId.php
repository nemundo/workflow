<?php

namespace Nemundo\Workflow\App\Message\Data\MessageType;

use Nemundo\Model\Id\AbstractModelIdValue;

class MessageTypeId extends AbstractModelIdValue
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