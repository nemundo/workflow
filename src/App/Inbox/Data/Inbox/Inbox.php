<?php
namespace Nemundo\Workflow\App\Inbox\Data\Inbox;
class Inbox extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var InboxModel
*/
protected $model;

/**
* @var string
*/
public $contentTypeId;

/**
* @var string
*/
public $dataId;

/**
* @var string
*/
public $subject;

/**
* @var string
*/
public $userId;

/**
* @var bool
*/
public $archive;

public function __construct() {
parent::__construct();
$this->model = new InboxModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->archive, $this->archive);
$id = parent::save();
return $id;
}
}