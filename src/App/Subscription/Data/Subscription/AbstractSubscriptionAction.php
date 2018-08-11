<?php
namespace Nemundo\Workflow\App\Subscription\Data\Subscription;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractSubscriptionAction extends AbstractModelAction {
/**
* @return SubscriptionRow
*/
protected function getRow() {
$reader = new SubscriptionReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}