<?php

namespace Nemundo\Workflow\App\Message\Data\MessageTo;

use Nemundo\Model\Data\AbstractModelUpdate;

class MessageToUpdate extends AbstractModelUpdate
{
    /**
     * @var MessageToModel
     */
    public $model;

    /**
     * @var string
     */
    public $toId;

    /**
     * @var string
     */
    public $messageId;

    public function __construct()
    {
        parent::__construct();
        $this->model = new MessageToModel();
    }

    public function update()
    {
        $this->typeValueList->setModelValue($this->model->toId, $this->toId);
        $this->typeValueList->setModelValue($this->model->messageId, $this->messageId);
        parent::update();
    }
}