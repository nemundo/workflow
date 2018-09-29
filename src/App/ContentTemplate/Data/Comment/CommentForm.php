<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\Comment;
class CommentForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var CommentModel
*/
public $model;

protected function loadCom() {
$this->model = new CommentModel();
}
}