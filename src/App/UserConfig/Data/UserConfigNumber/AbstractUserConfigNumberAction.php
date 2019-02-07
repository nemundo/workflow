<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigNumber;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractUserConfigNumberAction extends AbstractModelAction {
/**
* @return UserConfigNumberRow
*/
protected function getRow() {
$reader = new UserConfigNumberReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}
