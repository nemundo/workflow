<?php
namespace Nemundo\Workflow\App\ToDo\Data\ToDo;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractToDoAction extends AbstractModelAction {
/**
* @return ToDoRow
*/
protected function getRow() {
$reader = new ToDoReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}