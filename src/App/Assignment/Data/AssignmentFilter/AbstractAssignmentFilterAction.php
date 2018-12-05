<?php
namespace Nemundo\Workflow\App\Assignment\Data\AssignmentFilter;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractAssignmentFilterAction extends AbstractModelAction {
/**
* @return AssignmentFilterRow
*/
protected function getRow() {
$reader = new AssignmentFilterReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}