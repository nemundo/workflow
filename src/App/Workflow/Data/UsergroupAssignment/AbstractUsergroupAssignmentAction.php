<?php
namespace Nemundo\Workflow\App\Workflow\Data\UsergroupAssignment;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractUsergroupAssignmentAction extends AbstractModelAction {
/**
* @return UsergroupAssignmentRow
*/
protected function getRow() {
$reader = new UsergroupAssignmentReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}