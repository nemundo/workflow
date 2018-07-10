<?php
namespace Nemundo\Workflow\App\Workflow\Data\UserAssignment;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class UserAssignmentTable extends BootstrapModelTable {
/**
* @var UserAssignmentModel
*/
public $model;

protected function loadCom() {
$this->model = new UserAssignmentModel();
}
}