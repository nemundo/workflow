<?php
namespace Nemundo\Workflow\Data\UserNotification;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractUserNotificationAction extends AbstractModelAction {
/**
* @return UserNotificationRow
*/
protected function getRow() {
$reader = new UserNotificationReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}