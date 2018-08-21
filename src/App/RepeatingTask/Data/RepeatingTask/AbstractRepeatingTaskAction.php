<?php
namespace Nemundo\Workflow\App\RepeatingTask\Data\RepeatingTask;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractRepeatingTaskAction extends AbstractModelAction {
/**
* @return RepeatingTaskRow
*/
protected function getRow() {
$reader = new RepeatingTaskReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}