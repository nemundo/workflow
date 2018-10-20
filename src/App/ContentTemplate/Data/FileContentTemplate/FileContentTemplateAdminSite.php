<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\FileContentTemplate;
use Nemundo\Model\Site\AbstractModelAdminSite;
class FileContentTemplateAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var FileContentTemplateModel
*/
public $model;

protected function loadSite() {
$this->model = new FileContentTemplateModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}