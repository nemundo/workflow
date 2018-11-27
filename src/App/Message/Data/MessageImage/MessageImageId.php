<?php

namespace Nemundo\Workflow\App\Message\Data\MessageImage;

use Nemundo\Model\Id\AbstractModelIdValue;

class MessageImageId extends AbstractModelIdValue
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