<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey3;
use Nemundo\Model\Site\AbstractModelAdminSite;
class Survey3AdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var Survey3Model
*/
public $model;

protected function loadSite() {
$this->model = new Survey3Model();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}