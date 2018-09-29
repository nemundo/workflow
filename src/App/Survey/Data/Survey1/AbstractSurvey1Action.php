<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey1;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractSurvey1Action extends AbstractModelAction {
/**
* @return Survey1Row
*/
protected function getRow() {
$reader = new Survey1Reader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}