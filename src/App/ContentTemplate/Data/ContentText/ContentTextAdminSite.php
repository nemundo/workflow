<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentText;
use Nemundo\Model\Site\AbstractModelAdminSite;
class ContentTextAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var ContentTextModel
*/
public $model;

protected function loadSite() {
$this->model = new ContentTextModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}