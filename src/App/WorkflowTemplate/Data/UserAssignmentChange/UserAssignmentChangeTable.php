<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserAssignmentChange;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class UserAssignmentChangeTable extends BootstrapModelTable {
/**
* @var UserAssignmentChangeModel
*/
public $model;

protected function loadCom() {
$this->model = new UserAssignmentChangeModel();
}
}