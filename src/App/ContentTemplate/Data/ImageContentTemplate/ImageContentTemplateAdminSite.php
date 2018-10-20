<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ImageContentTemplate;
use Nemundo\Model\Site\AbstractModelAdminSite;
class ImageContentTemplateAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var ImageContentTemplateModel
*/
public $model;

protected function loadSite() {
$this->model = new ImageContentTemplateModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}