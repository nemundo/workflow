<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SendInbox;
class SendInboxModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $comment;

protected function loadModel() {
$this->tableName = "workflow_template_send_inbox";
$this->aliasTableName = "workflow_template_send_inbox";
$this->label = "Send Inbox";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "workflow_template_send_inbox";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "workflow_template_send_inbox_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "workflow_template_send_inbox";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "workflow_template_send_inbox_user";
$this->userId->label = "User";
$this->loadUser();

$this->comment = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->comment->tableName = "workflow_template_send_inbox";
$this->comment->fieldName = "comment";
$this->comment->aliasFieldName = "workflow_template_send_inbox_comment";
$this->comment->label = "Comment";
$this->comment->allowNullValue = "";

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "workflow_template_send_inbox_user");
$this->user->tableName = "workflow_template_send_inbox";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "workflow_template_send_inbox_user";
$this->user->label = "User";
$this->user->validation = true;
}
}
}