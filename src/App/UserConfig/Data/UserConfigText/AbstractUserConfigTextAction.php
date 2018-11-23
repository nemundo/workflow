<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigText;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractUserConfigTextAction extends AbstractModelAction {
/**
* @return UserConfigTextRow
*/
protected function getRow() {
$reader = new UserConfigTextReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}