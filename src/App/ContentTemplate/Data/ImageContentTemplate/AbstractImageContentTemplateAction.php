<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ImageContentTemplate;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractImageContentTemplateAction extends AbstractModelAction {
/**
* @return ImageContentTemplateRow
*/
protected function getRow() {
$reader = new ImageContentTemplateReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}