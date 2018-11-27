<?php

namespace Nemundo\Workflow\App\Message\Data\MessageItem;

use Nemundo\Model\Id\AbstractModelIdValue;

class MessageItemId extends AbstractModelIdValue
{
    /**
     * @var MessageItemModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new MessageItemModel();
    }
}