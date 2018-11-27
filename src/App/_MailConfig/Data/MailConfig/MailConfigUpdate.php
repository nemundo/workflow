<?php
namespace Nemundo\Workflow\App\MailConfig\Data\MailConfig;
use Nemundo\Model\Data\AbstractModelUpdate;
class MailConfigUpdate extends AbstractModelUpdate {
/**
* @var MailConfigModel
*/
public $model;

/**
* @var string
*/
public $userId;

/**
* @var bool
*/
public $assignmentMail;

/**
* @var bool
*/
public $inboxMail;

public function __construct() {
parent::__construct();
$this->model = new MailConfigModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->assignmentMail, $this->assignmentMail);
$this->typeValueList->setModelValue($this->model->inboxMail, $this->inboxMail);
parent::update();
}
}