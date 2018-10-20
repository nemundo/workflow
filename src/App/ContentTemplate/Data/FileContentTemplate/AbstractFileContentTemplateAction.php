<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\FileContentTemplate;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractFileContentTemplateAction extends AbstractModelAction {
/**
* @return FileContentTemplateRow
*/
protected function getRow() {
$reader = new FileContentTemplateReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}