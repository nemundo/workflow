<?php
namespace Nemundo\Workflow\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class WorkflowCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\Data\DeadlineChange\DeadlineChangeModel());
$this->addModel(new \Nemundo\Workflow\Data\Process\ProcessModel());
$this->addModel(new \Nemundo\Workflow\Data\SubjectChange\SubjectChangeModel());
$this->addModel(new \Nemundo\Workflow\Data\UserAssignment\UserAssignmentModel());
$this->addModel(new \Nemundo\Workflow\Data\UserAssignmentChange\UserAssignmentChangeModel());
$this->addModel(new \Nemundo\Workflow\Data\UsergroupAssignment\UsergroupAssignmentModel());
$this->addModel(new \Nemundo\Workflow\Data\Workflow\WorkflowModel());
$this->addModel(new \Nemundo\Workflow\Data\WorkflowStatus\WorkflowStatusModel());
$this->addModel(new \Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeModel());
}
}