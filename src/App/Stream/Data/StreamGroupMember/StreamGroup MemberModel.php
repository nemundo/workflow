<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroupMember;
class StreamGroup MemberModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
$this->tableName = "stream_stream_group member";
$this->aliasTableName = "stream_stream_group member";
$this->label = "Stream Group Member";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "stream_stream_group member";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "stream_stream_group member_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "stream_stream_group member";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "stream_stream_group member_user";
$this->userId->label = "User";

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "stream_stream_group member_user");
$this->user->tableName = "stream_stream_group member";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "stream_stream_group member_user";
$this->user->label = "User";
}
}
}