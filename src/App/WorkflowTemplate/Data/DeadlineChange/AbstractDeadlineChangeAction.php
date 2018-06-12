<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\DeadlineChange;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractDeadlineChangeAction extends AbstractModelAction {
/**
* @return DeadlineChangeRow
*/
protected function getRow() {
$reader = new DeadlineChangeReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}