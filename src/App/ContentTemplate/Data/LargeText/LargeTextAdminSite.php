<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeText;
use Nemundo\Model\Site\AbstractModelAdminSite;
class LargeTextAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var LargeTextModel
*/
public $model;

protected function loadSite() {
$this->model = new LargeTextModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}