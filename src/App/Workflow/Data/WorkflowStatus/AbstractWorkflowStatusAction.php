<?php
namespace Nemundo\Workflow\App\Workflow\Data\WorkflowStatus;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractWorkflowStatusAction extends AbstractModelAction {
/**
* @return WorkflowStatusRow
*/
protected function getRow() {
$reader = new WorkflowStatusReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}