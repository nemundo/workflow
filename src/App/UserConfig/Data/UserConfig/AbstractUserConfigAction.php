<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfig;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractUserConfigAction extends AbstractModelAction {
/**
* @return UserConfigRow
*/
protected function getRow() {
$reader = new UserConfigReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}