<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigNumber;
class UserConfigNumberRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var UserConfigNumberModel
*/
public $model;

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
public $userConfigId;

/**
* @var \Nemundo\Workflow\App\UserConfig\Data\UserConfig\UserConfigRow
*/
public $userConfig;

/**
* @var int
*/
public $value;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoUserDataUserUseruserRow($model->user);
}
$this->userConfigId = $this->getModelValue($model->userConfigId);
if ($model->userConfig !== null) {
$this->loadNemundoWorkflowAppUserConfigDataUserConfigUserConfiguserConfigRow($model->userConfig);
}
$this->value = intval($this->getModelValue($model->value));
}
private function loadNemundoUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
private function loadNemundoWorkflowAppUserConfigDataUserConfigUserConfiguserConfigRow($model) {
$this->userConfig = new \Nemundo\Workflow\App\UserConfig\Data\UserConfig\UserConfigRow($this->row, $model);
}
}