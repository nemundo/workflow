<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey1;
use Nemundo\Model\Site\AbstractModelAdminSite;
class Survey1AdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var Survey1Model
*/
public $model;

protected function loadSite() {
$this->model = new Survey1Model();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}