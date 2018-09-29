<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\Comment;
use Nemundo\Model\Site\AbstractModelAdminSite;
class CommentAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var CommentModel
*/
public $model;

protected function loadSite() {
$this->model = new CommentModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}