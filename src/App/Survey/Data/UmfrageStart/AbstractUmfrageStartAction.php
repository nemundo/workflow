<?php
namespace Nemundo\Workflow\App\Survey\Data\UmfrageStart;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractUmfrageStartAction extends AbstractModelAction {
/**
* @return UmfrageStartRow
*/
protected function getRow() {
$reader = new UmfrageStartReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}