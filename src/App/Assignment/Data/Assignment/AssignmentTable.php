<?php
namespace Nemundo\Workflow\App\Assignment\Data\Assignment;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class AssignmentTable extends BootstrapModelTable {
/**
* @var AssignmentModel
*/
public $model;

protected function loadCom() {
$this->model = new AssignmentModel();
}
}