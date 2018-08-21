<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey2;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractSurvey2Action extends AbstractModelAction {
/**
* @return Survey2Row
*/
protected function getRow() {
$reader = new Survey2Reader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}