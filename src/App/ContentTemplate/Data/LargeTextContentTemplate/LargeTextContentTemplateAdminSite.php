<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeTextContentTemplate;
use Nemundo\Model\Site\AbstractModelAdminSite;
class LargeTextContentTemplateAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var LargeTextContentTemplateModel
*/
public $model;

protected function loadSite() {
$this->model = new LargeTextContentTemplateModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}