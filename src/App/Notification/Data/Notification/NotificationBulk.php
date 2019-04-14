<?php
namespace Nemundo\Workflow\App\Notification\Data\Notification;
class NotificationBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var NotificationModel
*/
protected $model;

/**
* @var string
*/
public $dataId;

/**
* @var string
*/
public $userId;

/**
* @var string
*/
public $contentTypeId;

/**
* @var string
*/
public $subject;

/**
* @var string
*/
public $message;

/**
* @var bool
*/
public $read;

/**
* @var bool
*/
public $archive;

public function __construct() {
parent::__construct();
$this->model = new NotificationModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
$this->typeValueList->setModelValue($this->model->message, $this->message);
$this->typeValueList->setModelValue($this->model->read, $this->read);
$this->typeValueList->setModelValue($this->model->archive, $this->archive);
$id = parent::save();
return $id;
}
}