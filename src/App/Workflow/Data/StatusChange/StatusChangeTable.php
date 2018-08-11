<?php
namespace Nemundo\Workflow\App\Workflow\Data\StatusChange;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class StatusChangeTable extends BootstrapModelTable {
/**
* @var StatusChangeModel
*/
public $model;

protected function loadCom() {
$this->model = new StatusChangeModel();
}
}