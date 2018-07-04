<?php
namespace Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractWorkflowStatusChangeAction extends AbstractModelAction {
/**
* @return WorkflowStatusChangeRow
*/
protected function getRow() {
$reader = new WorkflowStatusChangeReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}