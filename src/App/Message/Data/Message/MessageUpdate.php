<?php
namespace Nemundo\Workflow\App\Message\Data\Message;
use Nemundo\Model\Data\AbstractModelUpdate;
class MessageUpdate extends AbstractModelUpdate {
/**
* @var MessageModel
*/
public $model;

/**
* @var string
*/
public $toId;

/**
* @var string
*/
public $subject;

/**
* @var string
*/
public $text;

/**
* @var int
*/
public $count;

public function __construct() {
parent::__construct();
$this->model = new MessageModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->toId, $this->toId);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
$this->typeValueList->setModelValue($this->model->text, $this->text);
$this->typeValueList->setModelValue($this->model->count, $this->count);
parent::update();
}
}