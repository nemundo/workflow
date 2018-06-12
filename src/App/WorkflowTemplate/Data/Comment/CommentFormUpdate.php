<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\Comment;
use Nemundo\Model\Form\ModelFormUpdate;
class CommentFormUpdate extends ModelFormUpdate {
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