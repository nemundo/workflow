<?php
namespace Nemundo\Workflow\App\PersonalTask\Data\Comment;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class CommentTable extends BootstrapModelTable {
/**
* @var CommentModel
*/
public $model;

protected function loadCom() {
$this->model = new CommentModel();
}
}