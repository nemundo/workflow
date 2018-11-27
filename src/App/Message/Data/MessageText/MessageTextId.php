<?php

namespace Nemundo\Workflow\App\Message\Data\MessageText;

use Nemundo\Model\Id\AbstractModelIdValue;

class MessageTextId extends AbstractModelIdValue
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