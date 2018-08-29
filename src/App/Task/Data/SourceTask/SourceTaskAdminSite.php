<?php
namespace Nemundo\Workflow\App\Task\Data\SourceTask;
use Nemundo\Model\Site\AbstractModelAdminSite;
class SourceTaskAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var SourceTaskModel
*/
public $model;

protected function loadSite() {
$this->model = new SourceTaskModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}