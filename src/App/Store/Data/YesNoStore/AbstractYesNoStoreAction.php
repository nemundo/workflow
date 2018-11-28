<?php
namespace Nemundo\Workflow\App\Store\Data\YesNoStore;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractYesNoStoreAction extends AbstractModelAction {
/**
* @return YesNoStoreRow
*/
protected function getRow() {
$reader = new YesNoStoreReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}