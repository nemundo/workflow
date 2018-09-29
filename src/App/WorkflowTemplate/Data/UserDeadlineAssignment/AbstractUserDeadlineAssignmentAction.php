<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\UserDeadlineAssignment;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractUserDeadlineAssignmentAction extends AbstractModelAction {
/**
* @return UserDeadlineAssignmentRow
*/
protected function getRow() {
$reader = new UserDeadlineAssignmentReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}