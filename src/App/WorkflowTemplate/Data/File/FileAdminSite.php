<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\File;
use Nemundo\Model\Site\AbstractModelAdminSite;
class FileAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var FileModel
*/
public $model;

protected function loadSite() {
$this->model = new FileModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}