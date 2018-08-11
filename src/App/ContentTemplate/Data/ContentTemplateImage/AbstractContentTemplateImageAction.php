<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateImage;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractContentTemplateImageAction extends AbstractModelAction {
/**
* @return ContentTemplateImageRow
*/
protected function getRow() {
$reader = new ContentTemplateImageReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}