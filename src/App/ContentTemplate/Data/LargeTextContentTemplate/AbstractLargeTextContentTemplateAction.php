<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeTextContentTemplate;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractLargeTextContentTemplateAction extends AbstractModelAction {
/**
* @return LargeTextContentTemplateRow
*/
protected function getRow() {
$reader = new LargeTextContentTemplateReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}