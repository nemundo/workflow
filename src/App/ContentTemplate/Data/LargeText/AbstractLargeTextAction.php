<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeText;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractLargeTextAction extends AbstractModelAction {
/**
* @return LargeTextRow
*/
protected function getRow() {
$reader = new LargeTextReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}