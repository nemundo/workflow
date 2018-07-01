<?php
namespace Nemundo\Workflow\App\PersonalTask\Data\PersonalTask;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractPersonalTaskAction extends AbstractModelAction {
/**
* @return PersonalTaskRow
*/
protected function getRow() {
$reader = new PersonalTaskReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}