<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamNotification;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractStreamNotificationAction extends AbstractModelAction {
/**
* @return StreamNotificationRow
*/
protected function getRow() {
$reader = new StreamNotificationReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}