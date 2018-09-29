<?php
namespace Nemundo\Workflow\App\Notification\Data\Notification;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractNotificationAction extends AbstractModelAction {
/**
* @return NotificationRow
*/
protected function getRow() {
$reader = new NotificationReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}