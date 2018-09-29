<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserDeadlineAssignment;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class UserDeadlineAssignmentTable extends BootstrapModelTable {
/**
* @var UserDeadlineAssignmentModel
*/
public $model;

protected function loadCom() {
$this->model = new UserDeadlineAssignmentModel();
}
}