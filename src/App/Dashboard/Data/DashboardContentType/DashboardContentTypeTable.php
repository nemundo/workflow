<?php
namespace Nemundo\Workflow\App\Dashboard\Data\DashboardContentType;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class DashboardContentTypeTable extends BootstrapModelTable {
/**
* @var DashboardContentTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new DashboardContentTypeModel();
}
}