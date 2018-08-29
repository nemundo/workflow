<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationType;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractNotificationTypeAction extends AbstractModelAction {
/**
* @return NotificationTypeRow
*/
protected function getRow() {
$reader = new NotificationTypeReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}