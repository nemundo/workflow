<?php
namespace Nemundo\Workflow\App\PersonalTask\Data\Comment;
class CommentAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var CommentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  CommentModel();
}
}