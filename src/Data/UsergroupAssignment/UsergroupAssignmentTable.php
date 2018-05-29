<?php
namespace Nemundo\Workflow\Data\UsergroupAssignment;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class UsergroupAssignmentTable extends BootstrapModelTable {
/**
* @var UsergroupAssignmentModel
*/
public $model;

protected function loadCom() {
$this->model = new UsergroupAssignmentModel();
}
}