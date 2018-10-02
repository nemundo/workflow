<?php
namespace Nemundo\Workflow\App\Assignment\Data\AssignmentFilter;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class AssignmentFilterTable extends BootstrapModelTable {
/**
* @var AssignmentFilterModel
*/
public $model;

protected function loadCom() {
$this->model = new AssignmentFilterModel();
}
}