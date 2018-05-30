<?php
namespace Nemundo\Workflow\Data\UserAssignmentChange;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractUserAssignmentChangeAction extends AbstractModelAction {
/**
* @return UserAssignmentChangeRow
*/
protected function getRow() {
$reader = new UserAssignmentChangeReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}