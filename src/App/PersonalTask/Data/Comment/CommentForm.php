<?php
namespace Nemundo\Workflow\App\PersonalTask\Data\Comment;
class CommentForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var CommentModel
*/
public $model;

protected function loadCom() {
$this->model = new CommentModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}