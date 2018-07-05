<?php
namespace Nemundo\Workflow\App\Message\Data\MessageItem;
class MessageItem extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var MessageItemModel
*/
protected $model;

/**
* @var string
*/
public $messageId;

/**
* @var string
*/
public $dataId;

/**
* @var string
*/
public $contentTypeId;

public function __construct() {
parent::__construct();
$this->model = new MessageItemModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->messageId, $this->messageId);
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$id = parent::save();
return $id;
}
}