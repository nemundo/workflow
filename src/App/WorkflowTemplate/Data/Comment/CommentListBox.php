<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\Comment;
class CommentListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var CommentModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new CommentModel();
$this->label = $this->model->label;
}
}