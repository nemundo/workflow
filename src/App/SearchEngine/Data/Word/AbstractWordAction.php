<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Word;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractWordAction extends AbstractModelAction {
/**
* @return WordRow
*/
protected function getRow() {
$reader = new WordReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}