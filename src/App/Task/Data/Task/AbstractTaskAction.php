<?php
namespace Nemundo\Workflow\App\Task\Data\Task;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractTaskAction extends AbstractModelAction {
/**
* @return TaskRow
*/
protected function getRow() {
$reader = new TaskReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}