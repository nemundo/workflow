<?php
namespace Nemundo\Workflow\App\Wiki\Data\Wiki;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractWikiAction extends AbstractModelAction {
/**
* @return WikiRow
*/
protected function getRow() {
$reader = new WikiReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}