<?php
namespace Nemundo\Workflow\App\Workflow\Data\UserAssignment;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractUserAssignmentAction extends AbstractModelAction {
/**
* @return UserAssignmentRow
*/
protected function getRow() {
$reader = new UserAssignmentReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}