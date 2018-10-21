<?php
namespace Nemundo\Workflow\App\ToDo\Data\ToDo;
class ToDoModel extends \Nemundo\App\Workflow\Model\AbstractWorkflowModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $todo;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $done;

/**
* @var \Nemundo\Model\Type\User\CreatedUserType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

protected function loadModel() {
$this->tableName = "todo_todo";
$this->aliasTableName = "todo_todo";
$this->label = "ToDo";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "todo_todo";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "todo_todo_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;


$this->id->visible->form = false;


$this->todo = new \Nemundo\Model\Type\Text\TextType($this);
$this->todo->tableName = "todo_todo";
$this->todo->fieldName = "todo";
$this->todo->aliasFieldName = "todo_todo_todo";
$this->todo->label = "To Do";
$this->todo->validation = true;
$this->todo->allowNullValue = "";
$this->todo->length = 255;

$this->done = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->done->tableName = "todo_todo";
$this->done->fieldName = "done";
$this->done->aliasFieldName = "todo_todo_done";
$this->done->label = "Done";
$this->done->allowNullValue = "";
$this->done->visible->form = false;

$this->userId = new \Nemundo\Model\Type\User\CreatedUserType($this);
$this->userId->tableName = "todo_todo";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "todo_todo_user";
$this->userId->label = "User";

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "todo_todo_user");
$this->user->tableName = "todo_todo";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "todo_todo_user";
$this->user->label = "User";
$this->user->visible->form = false;
}
}
}