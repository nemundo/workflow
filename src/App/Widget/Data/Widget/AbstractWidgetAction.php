<?php
namespace Nemundo\Workflow\App\Widget\Data\Widget;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractWidgetAction extends AbstractModelAction {
/**
* @return WidgetRow
*/
protected function getRow() {
$reader = new WidgetReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}