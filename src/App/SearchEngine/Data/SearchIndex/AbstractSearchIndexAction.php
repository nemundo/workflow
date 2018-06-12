<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\SearchIndex;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractSearchIndexAction extends AbstractModelAction {
/**
* @return SearchIndexRow
*/
protected function getRow() {
$reader = new SearchIndexReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}