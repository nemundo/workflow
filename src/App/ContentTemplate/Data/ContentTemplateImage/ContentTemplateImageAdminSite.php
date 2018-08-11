<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateImage;
use Nemundo\Model\Site\AbstractModelAdminSite;
class ContentTemplateImageAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var ContentTemplateImageModel
*/
public $model;

protected function loadSite() {
$this->model = new ContentTemplateImageModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}