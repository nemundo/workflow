<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\Comment;
class CommentPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var CommentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new CommentModel();
}
}