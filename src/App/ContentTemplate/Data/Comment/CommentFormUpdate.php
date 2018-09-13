<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\Comment;
use Nemundo\Model\Form\ModelFormUpdate;
class CommentFormUpdate extends ModelFormUpdate {
/**
* @var CommentModel
*/
public $model;

protected function loadCom() {
$this->model = new CommentModel();
}
}