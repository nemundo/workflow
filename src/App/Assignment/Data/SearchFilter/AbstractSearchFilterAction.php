<?php
namespace Nemundo\Workflow\App\Assignment\Data\SearchFilter;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractSearchFilterAction extends AbstractModelAction {
/**
* @return SearchFilterRow
*/
protected function getRow() {
$reader = new SearchFilterReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}
