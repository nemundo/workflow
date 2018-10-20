<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TextContentTemplate;
use Nemundo\Model\Site\AbstractModelAdminSite;
class TextContentTemplateAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var TextContentTemplateModel
*/
public $model;

protected function loadSite() {
$this->model = new TextContentTemplateModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}