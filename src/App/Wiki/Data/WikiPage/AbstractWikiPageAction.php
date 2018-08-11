<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiPage;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractWikiPageAction extends AbstractModelAction {
/**
* @return WikiPageRow
*/
protected function getRow() {
$reader = new WikiPageReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}