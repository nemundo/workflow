<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateLargeText;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractTemplateLargeTextAction extends AbstractModelAction {
/**
* @return TemplateLargeTextRow
*/
protected function getRow() {
$reader = new TemplateLargeTextReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}