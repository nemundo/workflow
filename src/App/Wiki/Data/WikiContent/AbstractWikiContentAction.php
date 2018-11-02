<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContent;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractWikiContentAction extends AbstractModelAction {
/**
* @return WikiContentRow
*/
protected function getRow() {
$reader = new WikiContentReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}