<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey2;
use Nemundo\Model\Site\AbstractModelAdminSite;
class Survey2AdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var Survey2Model
*/
public $model;

protected function loadSite() {
$this->model = new Survey2Model();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}