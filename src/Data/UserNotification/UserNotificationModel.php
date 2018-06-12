<?php
namespace Nemundo\Workflow\Data\UserNotification;
class UserNotificationModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $statusChangeId;

/**
* @var \Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeExternalType
*/
public $statusChange;

protected function loadModel() {
$this->tableName = "workflow_user_notification";
$this->aliasTableName = "workflow_user_notification";
$this->label = "User Notification";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "workflow_user_notification";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "workflow_user_notification_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "workflow_user_notification";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "workflow_user_notification_user";
$this->userId->label = "User";

$this->statusChangeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->statusChangeId->tableName = "workflow_user_notification";
$this->statusChangeId->fieldName = "status_change";
$this->statusChangeId->aliasFieldName = "workflow_user_notification_status_change";
$this->statusChangeId->label = "Status Change";

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "workflow_user_notification_user");
$this->user->tableName = "workflow_user_notification";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "workflow_user_notification_user";
$this->user->label = "User";
}
}
public function loadStatusChange() {
if ($this->statusChange == null) {
$this->statusChange = new \Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeExternalType($this, "workflow_user_notification_status_change");
$this->statusChange->tableName = "workflow_user_notification";
$this->statusChange->fieldName = "status_change";
$this->statusChange->aliasFieldName = "workflow_user_notification_status_change";
$this->statusChange->label = "Status Change";
}
}
}