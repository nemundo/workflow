<?php

namespace Nemundo\Workflow\App\Message\Data\MessageTo;
class MessageTo extends \Nemundo\Model\Data\AbstractModelData
{
    /**
     * @var MessageToModel
     */
    protected $model;

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

    public function save()
    {
        $this->typeValueList->setModelValue($this->model->toId, $this->toId);
        $this->typeValueList->setModelValue($this->model->messageId, $this->messageId);
        $id = parent::save();
        return $id;
    }
}