<?php

namespace Nemundo\Workflow\App\Message\Data\MessageImage;
class MessageImageCount extends \Nemundo\Model\Count\AbstractModelDataCount
{
    /**
     * @var MessageImageModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new MessageImageModel();
    }
}