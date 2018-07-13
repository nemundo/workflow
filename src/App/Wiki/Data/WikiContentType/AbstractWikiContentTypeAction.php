<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContentType;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractWikiContentTypeAction extends AbstractModelAction {
/**
* @return WikiContentTypeRow
*/
protected function getRow() {
$reader = new WikiContentTypeReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}