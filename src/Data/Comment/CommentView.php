<?php
namespace Nemundo\Workflow\Data\Comment;
use Nemundo\Model\View\ModelView;
class CommentView extends ModelView {
/**
* @var CommentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new CommentModel();
}
}