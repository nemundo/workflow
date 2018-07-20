<?php
namespace Nemundo\Workflow\App\Wiki\Data\TitleChange;
use Nemundo\Model\Site\AbstractModelAdminSite;
class TitleChangeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var TitleChangeModel
*/
public $model;

protected function loadSite() {
$this->model = new TitleChangeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}