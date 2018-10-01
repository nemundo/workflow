<?php
namespace Nemundo\Workflow\App\Dashboard\Data\DashboardContentType;
class DashboardContentTypeAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var DashboardContentTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  DashboardContentTypeModel();
}
}