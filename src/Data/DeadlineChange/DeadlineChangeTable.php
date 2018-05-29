<?php
namespace Nemundo\Workflow\Data\DeadlineChange;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class DeadlineChangeTable extends BootstrapModelTable {
/**
* @var DeadlineChangeModel
*/
public $model;

protected function loadCom() {
$this->model = new DeadlineChangeModel();
}
}