<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SendInbox;
class SendInboxBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var SendInboxModel
*/
protected $model;

/**
* @var string
*/
public $userId;

/**
* @var string
*/
public $comment;

public function __construct() {
parent::__construct();
$this->model = new SendInboxModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->comment, $this->comment);
$id = parent::save();
return $id;
}
}