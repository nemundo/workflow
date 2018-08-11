<?php
namespace Nemundo\Workflow\App\Message\Data\Message;
class Message extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var MessageModel
*/
protected $model;

/**
* @var string
*/
public $subject;

/**
* @var int
*/
public $count;

public function __construct() {
parent::__construct();
$this->model = new MessageModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
$this->typeValueList->setModelValue($this->model->count, $this->count);
$id = parent::save();
return $id;
}
}