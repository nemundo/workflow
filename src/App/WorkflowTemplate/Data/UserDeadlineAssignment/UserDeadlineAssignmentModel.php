<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserDeadlineAssignment;
class UserDeadlineAssignmentModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
* @var \Nemundo\Model\Type\DateTime\DateType
*/
public $deadline;

protected function loadModel() {
$this->tableName = "workflow_template_user_deadline_assignment";
$this->aliasTableName = "workflow_template_user_deadline_assignment";
$this->label = "User Deadline Assignment";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "workflow_template_user_deadline_assignment";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "workflow_template_user_deadline_assignment_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "workflow_template_user_deadline_assignment";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "workflow_template_user_deadline_assignment_user";
$this->userId->label = "Mitarbeiter";
$this->loadUser();

$this->deadline = new \Nemundo\Model\Type\DateTime\DateType($this);
$this->deadline->tableName = "workflow_template_user_deadline_assignment";
$this->deadline->fieldName = "deadline";
$this->deadline->aliasFieldName = "workflow_template_user_deadline_assignment_deadline";
$this->deadline->label = "Erledigen bis";
$this->deadline->validation = true;
$this->deadline->allowNullValue = "";

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "workflow_template_user_deadline_assignment_user");
$this->user->tableName = "workflow_template_user_deadline_assignment";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "workflow_template_user_deadline_assignment_user";
$this->user->label = "Mitarbeiter";
$this->user->validation = true;
}
}
}