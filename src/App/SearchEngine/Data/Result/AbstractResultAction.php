<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Result;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractResultAction extends AbstractModelAction {
/**
* @return ResultRow
*/
protected function getRow() {
$reader = new ResultReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}