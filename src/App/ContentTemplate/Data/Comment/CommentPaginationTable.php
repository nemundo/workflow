<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\Comment;
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