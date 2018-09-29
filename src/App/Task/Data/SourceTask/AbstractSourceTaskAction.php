<?php
namespace Nemundo\Workflow\App\Task\Data\SourceTask;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractSourceTaskAction extends AbstractModelAction {
/**
* @return SourceTaskRow
*/
protected function getRow() {
$reader = new SourceTaskReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}