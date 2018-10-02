<?php
namespace Nemundo\Workflow\App\Notification\Data\Notification;
class NotificationRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $dataId;

/**
* @var string
*/
public $userId;

/**
* @var \Nemundo\App\User\Data\User\UserRow
*/
public $user;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->dataId = $this->getModelValue($model->dataId);
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoAppUserDataUserUseruserRow($model->user);
}
}
private function loadNemundoAppUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\App\User\Data\User\UserRow($this->row, $model);
}
}