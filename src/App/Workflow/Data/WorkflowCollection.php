<?php
namespace Nemundo\Workflow\App\Workflow\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class WorkflowCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\Workflow\Data\MailConfig\MailConfigModel());
$this->addModel(new \Nemundo\Workflow\App\Workflow\Data\Process\ProcessModel());
$this->addModel(new \Nemundo\Workflow\App\Workflow\Data\UserAssignment\UserAssignmentModel());
$this->addModel(new \Nemundo\Workflow\App\Workflow\Data\UserNotification\UserNotificationModel());
$this->addModel(new \Nemundo\Workflow\App\Workflow\Data\UsergroupAssignment\UsergroupAssignmentModel());
$this->addModel(new \Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowModel());
$this->addModel(new \Nemundo\Workflow\App\Workflow\Data\WorkflowStatus\WorkflowStatusModel());
$this->addModel(new \Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeModel());
}
}