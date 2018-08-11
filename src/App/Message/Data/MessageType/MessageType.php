<?php
namespace Nemundo\Workflow\App\Message\Data\MessageType;
class MessageType extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var MessageTypeModel
*/
protected $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $messageType;

public function __construct() {
parent::__construct();
$this->model = new MessageTypeModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->messageType, $this->messageType);
$id = parent::save();
return $id;
}
}