<?php
namespace Nemundo\Workflow\App\RepeatingTask\Data\RepeatingTask;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class RepeatingTaskTable extends BootstrapModelTable {
/**
* @var RepeatingTaskModel
*/
public $model;

protected function loadCom() {
$this->model = new RepeatingTaskModel();
}
}