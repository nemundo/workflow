<?php
namespace Nemundo\Workflow\Data\Process;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class ProcessTable extends BootstrapModelTable {
/**
* @var ProcessModel
*/
public $model;

protected function loadCom() {
$this->model = new ProcessModel();
}
}