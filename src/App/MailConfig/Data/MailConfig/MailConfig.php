<?php
namespace Nemundo\Workflow\App\MailConfig\Data\MailConfig;
class MailConfig extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var MailConfigModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->assignmentMail, $this->assignmentMail);
$this->typeValueList->setModelValue($this->model->inboxMail, $this->inboxMail);
$id = parent::save();
return $id;
}
}