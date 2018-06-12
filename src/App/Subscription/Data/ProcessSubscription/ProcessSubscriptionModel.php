<?php
namespace Nemundo\Workflow\App\Subscription\Data\ProcessSubscription;
class ProcessSubscriptionModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $processId;

/**
* @var \Nemundo\Workflow\Data\Process\ProcessExternalType
*/
public $process;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

protected function loadModel() {
$this->tableName = "subscription_processsubscription";
$this->aliasTableName = "subscription_processsubscription";
$this->label = "ProcessSubscription";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "subscription_processsubscription";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "subscription_processsubscription_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->processId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->processId->tableName = "subscription_processsubscription";
$this->processId->fieldName = "process";
$this->processId->aliasFieldName = "subscription_processsubscription_process";
$this->processId->label = "Process";

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "subscription_processsubscription";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "subscription_processsubscription_user";
$this->userId->label = "User";

}
public function loadProcess() {
if ($this->process == null) {
$this->process = new \Nemundo\Workflow\Data\Process\ProcessExternalType($this, "subscription_processsubscription_process");
$this->process->tableName = "subscription_processsubscription";
$this->process->fieldName = "process";
$this->process->aliasFieldName = "subscription_processsubscription_process";
$this->process->label = "Process";
}
}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "subscription_processsubscription_user");
$this->user->tableName = "subscription_processsubscription";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "subscription_processsubscription_user";
$this->user->label = "User";
}
}
}