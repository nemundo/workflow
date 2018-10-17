<?php
namespace Nemundo\Workflow\App\Store\Data\LargeTextStore;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractLargeTextStoreAction extends AbstractModelAction {
/**
* @return LargeTextStoreRow
*/
protected function getRow() {
$reader = new LargeTextStoreReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}