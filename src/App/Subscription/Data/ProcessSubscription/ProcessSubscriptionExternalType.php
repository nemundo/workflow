<?php
namespace Nemundo\Workflow\App\Subscription\Data\ProcessSubscription;
class ProcessSubscriptionExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $processId;

/**
* @var \Nemundo\Workflow\Data\Process\ProcessExternalType
*/
public $process;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = ProcessSubscriptionModel::class;
$this->externalTableName = "subscription_processsubscription";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->processId = new \Nemundo\Model\Type\Id\IdType();
$this->processId->fieldName = "process";
$this->processId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->processId->aliasFieldName = $this->processId->tableName ."_".$this->processId->fieldName;
$this->processId->label = "Process";
$this->addType($this->processId);

$this->userId = new \Nemundo\Model\Type\Id\IdType();
$this->userId->fieldName = "user";
$this->userId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userId->aliasFieldName = $this->userId->tableName ."_".$this->userId->fieldName;
$this->userId->label = "User";
$this->addType($this->userId);

}
public function loadProcess() {
if ($this->process == null) {
$this->process = new \Nemundo\Workflow\Data\Process\ProcessExternalType(null, $this->parentFieldName . "_process");
$this->process->fieldName = "process";
$this->process->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->process->aliasFieldName = $this->process->tableName ."_".$this->process->fieldName;
$this->process->label = "Process";
$this->addType($this->process);
}
return $this;
}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType(null, $this->parentFieldName . "_user");
$this->user->fieldName = "user";
$this->user->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->user->aliasFieldName = $this->user->tableName ."_".$this->user->fieldName;
$this->user->label = "User";
$this->addType($this->user);
}
return $this;
}
}