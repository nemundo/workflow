<?php
namespace Nemundo\App\Content\Data\ContentType;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractContentTypeAction extends AbstractModelAction {
/**
* @return ContentTypeRow
*/
protected function getRow() {
$reader = new ContentTypeReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}