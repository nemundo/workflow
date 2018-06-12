<?php
namespace Nemundo\Workflow\App\Subscription\Data\WorkflowSubscription;
use Nemundo\Model\Action\AbstractModelAction;
abstract class AbstractWorkflowSubscriptionAction extends AbstractModelAction {
/**
* @return WorkflowSubscriptionRow
*/
protected function getRow() {
$reader = new WorkflowSubscriptionReader();
$reader->connection = $this->connection;
$row = $reader->getRowById($this->id);
return $row;
}
}