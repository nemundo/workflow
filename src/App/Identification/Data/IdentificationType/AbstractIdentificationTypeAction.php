<?php
namespace Nemundo\Workflow\App\Identification\Data\IdentificationType;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractIdentificationTypeAction extends AbstractModelAction {
/**
* @return IdentificationTypeRow
*/
protected function getRow() {
$reader = new IdentificationTypeReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}