<?php

namespace Nemundo\Workflow\App\Message\Data\MessageItem;
class MessageItemCount extends \Nemundo\Model\Count\AbstractModelDataCount
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