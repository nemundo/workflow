<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Document;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractDocumentAction extends AbstractModelAction {
/**
* @return DocumentRow
*/
protected function getRow() {
$reader = new DocumentReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}