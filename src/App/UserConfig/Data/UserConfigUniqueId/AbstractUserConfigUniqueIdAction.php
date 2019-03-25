<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigUniqueId;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractUserConfigUniqueIdAction extends AbstractModelAction {
/**
* @return UserConfigUniqueIdRow
*/
protected function getRow() {
$reader = new UserConfigUniqueIdReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}
