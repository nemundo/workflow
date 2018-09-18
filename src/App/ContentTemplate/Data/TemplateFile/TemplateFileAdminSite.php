<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateFile;
use Nemundo\Model\Site\AbstractModelAdminSite;
class TemplateFileAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var TemplateFileModel
*/
public $model;

protected function loadSite() {
$this->model = new TemplateFileModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}