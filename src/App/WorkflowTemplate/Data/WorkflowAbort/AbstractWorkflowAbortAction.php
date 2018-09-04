<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\WorkflowAbort;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractWorkflowAbortAction extends AbstractModelAction {
/**
* @return WorkflowAbortRow
*/
protected function getRow() {
$reader = new WorkflowAbortReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}