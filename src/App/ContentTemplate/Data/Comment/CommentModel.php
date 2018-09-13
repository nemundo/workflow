<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\Comment;
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
$this->tableName = "content_template_comment";
$this->aliasTableName = "content_template_comment";
$this->label = "Comment";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_template_comment";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_template_comment_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->comment = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->comment->tableName = "content_template_comment";
$this->comment->fieldName = "comment";
$this->comment->aliasFieldName = "content_template_comment_comment";
$this->comment->label = "Comment";
$this->comment->allowNullValue = "";

}
}