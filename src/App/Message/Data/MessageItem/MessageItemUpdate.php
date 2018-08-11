<?php
namespace Nemundo\Workflow\App\Message\Data\MessageItem;
use Nemundo\Model\Data\AbstractModelUpdate;
class MessageItemUpdate extends AbstractModelUpdate {
/**
* @var MessageItemModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->messageId, $this->messageId);
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
parent::update();
}
}