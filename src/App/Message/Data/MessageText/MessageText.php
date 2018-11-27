<?php

namespace Nemundo\Workflow\App\Message\Data\MessageText;
class MessageText extends \Nemundo\Model\Data\AbstractModelData
{
    /**
     * @var MessageTextModel
     */
    protected $model;

    /**
     * @var string
     */
    public $text;

    public function __construct()
    {
        parent::__construct();
        $this->model = new MessageTextModel();
    }

    public function save()
    {
        $this->typeValueList->setModelValue($this->model->text, $this->text);
        $id = parent::save();
        return $id;
    }
}