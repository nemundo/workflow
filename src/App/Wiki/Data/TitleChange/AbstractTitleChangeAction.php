<?php
namespace Nemundo\Workflow\App\Wiki\Data\TitleChange;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractTitleChangeAction extends AbstractModelAction {
/**
* @return TitleChangeRow
*/
protected function getRow() {
$reader = new TitleChangeReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}