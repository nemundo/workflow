<?php
namespace Nemundo\Workflow\App\Workflow\Data\Process;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class ProcessTable extends BootstrapModelTable {
/**
* @var ProcessModel
*/
public $model;

protected function loadCom() {
$this->model = new ProcessModel();
}
}