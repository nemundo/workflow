<?php
namespace Nemundo\Workflow\App\Widget\Data\WidgetType;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractWidgetTypeAction extends AbstractModelAction {
/**
* @return WidgetTypeRow
*/
protected function getRow() {
$reader = new WidgetTypeReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}