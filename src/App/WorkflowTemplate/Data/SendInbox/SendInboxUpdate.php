<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SendInbox;
use Nemundo\Model\Data\AbstractModelUpdate;
class SendInboxUpdate extends AbstractModelUpdate {
/**
* @var SendInboxModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->comment, $this->comment);
parent::update();
}
}