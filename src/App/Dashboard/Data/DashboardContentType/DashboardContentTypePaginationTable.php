<?php
namespace Nemundo\Workflow\App\Dashboard\Data\DashboardContentType;
class DashboardContentTypePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var DashboardContentTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new DashboardContentTypeModel();
}
}