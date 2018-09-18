<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateFile;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractTemplateFileAction extends AbstractModelAction {
/**
* @return TemplateFileRow
*/
protected function getRow() {
$reader = new TemplateFileReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}