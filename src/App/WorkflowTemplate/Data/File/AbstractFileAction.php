<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\File;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractFileAction extends AbstractModelAction {
/**
* @return FileRow
*/
protected function getRow() {
$reader = new FileReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}