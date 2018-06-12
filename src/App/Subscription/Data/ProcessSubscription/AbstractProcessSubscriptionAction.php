<?php
namespace Nemundo\Workflow\App\Subscription\Data\ProcessSubscription;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractProcessSubscriptionAction extends AbstractModelAction {
/**
* @return ProcessSubscriptionRow
*/
protected function getRow() {
$reader = new ProcessSubscriptionReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}