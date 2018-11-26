<?php
namespace Nemundo\Workflow\App\Store\Data\TextStore;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractTextStoreAction extends AbstractModelAction {
/**
* @return TextStoreRow
*/
protected function getRow() {
$reader = new TextStoreReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}