<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentText;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractContentTextAction extends AbstractModelAction {
/**
* @return ContentTextRow
*/
protected function getRow() {
$reader = new ContentTextReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}