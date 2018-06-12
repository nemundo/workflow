<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SubjectChange;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractSubjectChangeAction extends AbstractModelAction {
/**
* @return SubjectChangeRow
*/
protected function getRow() {
$reader = new SubjectChangeReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}