<?php
namespace Nemundo\Workflow\App\PersonalTask\Data\Comment;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractCommentAction extends AbstractModelAction {
/**
* @return CommentRow
*/
protected function getRow() {
$reader = new CommentReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}