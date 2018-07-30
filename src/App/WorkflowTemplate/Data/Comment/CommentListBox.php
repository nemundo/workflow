<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\Comment;
class CommentListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
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