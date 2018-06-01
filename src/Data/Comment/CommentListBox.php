<?php
namespace Nemundo\Workflow\Data\Comment;
class CommentListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var CommentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new CommentModel();
$this->label = $this->model->label;
}
}