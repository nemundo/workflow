<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserAssignmentChange;
class UserAssignmentChangeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "workflow_template_user_assignment_change";
$this->aliasTableName = "workflow_template_user_assignment_change";
$this->label = "User Assignment Change";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "workflow_template_user_assignment_change";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "workflow_template_user_assignment_change_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "workflow_template_user_assignment_change";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "workflow_template_user_assignment_change_user";
$this->userId->label = "Mitarbeiter";
$this->loadUser();

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "workflow_template_user_assignment_change_user");
$this->user->tableName = "workflow_template_user_assignment_change";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "workflow_template_user_assignment_change_user";
$this->user->label = "Mitarbeiter";
$this->user->validation = true;
}
}
}