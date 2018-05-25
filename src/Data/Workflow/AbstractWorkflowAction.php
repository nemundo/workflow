<?php
namespace Nemundo\Workflow\Data\Workflow;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractWorkflowAction extends AbstractModelAction {
/**
* @return WorkflowRow
*/
protected function getRow() {
$reader = new WorkflowReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}