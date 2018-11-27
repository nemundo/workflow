<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigYesNo;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractUserConfigYesNoAction extends AbstractModelAction {
/**
* @return UserConfigYesNoRow
*/
protected function getRow() {
$reader = new UserConfigYesNoReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}