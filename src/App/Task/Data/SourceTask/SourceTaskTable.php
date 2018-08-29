<?php
namespace Nemundo\Workflow\App\Task\Data\SourceTask;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class SourceTaskTable extends BootstrapModelTable {
/**
* @var SourceTaskModel
*/
public $model;

protected function loadCom() {
$this->model = new SourceTaskModel();
}
}