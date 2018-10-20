<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TextContentTemplate;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractTextContentTemplateAction extends AbstractModelAction {
/**
* @return TextContentTemplateRow
*/
protected function getRow() {
$reader = new TextContentTemplateReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}