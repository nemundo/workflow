<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\Comment;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class CommentTable extends BootstrapModelTable {
/**
* @var CommentModel
*/
public $model;

protected function loadCom() {
$this->model = new CommentModel();
}
}