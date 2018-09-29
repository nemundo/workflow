<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey3;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractSurvey3Action extends AbstractModelAction {
/**
* @return Survey3Row
*/
protected function getRow() {
$reader = new Survey3Reader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}