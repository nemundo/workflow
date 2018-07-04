<?php
namespace Nemundo\Workflow\App\Wiki\Data\Hyperlink;
use Nemundo\Model\Site\AbstractModelAdminSite;
class HyperlinkAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var HyperlinkModel
*/
public $model;

protected function loadSite() {
$this->model = new HyperlinkModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}