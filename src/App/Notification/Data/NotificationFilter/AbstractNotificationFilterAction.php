<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationFilter;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractNotificationFilterAction extends AbstractModelAction {
/**
* @return NotificationFilterRow
*/
protected function getRow() {
$reader = new NotificationFilterReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}