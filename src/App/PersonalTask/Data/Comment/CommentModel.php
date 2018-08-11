<?php
namespace Nemundo\Workflow\App\PersonalTask\Data\Comment;
class CommentModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $comment;

protected function loadModel() {
$this->tableName = "personal_task_comment";
$this->aliasTableName = "personal_task_comment";
$this->label = "Comment";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "personal_task_comment";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "personal_task_comment_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->comment = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->comment->tableName = "personal_task_comment";
$this->comment->fieldName = "comment";
$this->comment->aliasFieldName = "personal_task_comment_comment";
$this->comment->label = "Kommentar";
$this->comment->validation = true;
$this->comment->allowNullValue = "";

}
}