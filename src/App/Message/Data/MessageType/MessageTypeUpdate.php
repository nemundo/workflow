<?php
namespace Nemundo\Workflow\App\Message\Data\MessageType;
use Nemundo\Model\Data\AbstractModelUpdate;
class MessageTypeUpdate extends AbstractModelUpdate {
/**
* @var MessageTypeModel
*/
public $model;

/**
* @var string
*/
public $messageType;

public function __construct() {
parent::__construct();
$this->model = new MessageTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->messageType, $this->messageType);
parent::update();
}
}