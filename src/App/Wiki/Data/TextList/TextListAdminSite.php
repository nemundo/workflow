<?php
namespace Nemundo\Workflow\App\Wiki\Data\TextList;
use Nemundo\Model\Site\AbstractModelAdminSite;
class TextListAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var TextListModel
*/
public $model;

protected function loadSite() {
$this->model = new TextListModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}