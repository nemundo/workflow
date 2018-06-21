<?php
namespace Nemundo\Workflow\App\TeamInbox\Data\TeamUser;
class TeamUserRow extends \Nemundo\Model\Row\AbstractModelDataRow {
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
public $userId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $user;

/**
* @var string
*/
public $teamUserId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $teamUser;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoUserDataUserUseruserRow($model->user);
}
$this->teamUserId = $this->getModelValue($model->teamUserId);
if ($model->teamUser !== null) {
$this->loadNemundoUserDataUserUserteamUserRow($model->teamUser);
}
}
private function loadNemundoUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
private function loadNemundoUserDataUserUserteamUserRow($model) {
$this->teamUser = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
}