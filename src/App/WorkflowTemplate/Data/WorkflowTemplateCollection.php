<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class WorkflowTemplateCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\WorkflowTemplate\Data\Comment\CommentModel());
$this->addModel(new \Nemundo\Workflow\App\WorkflowTemplate\Data\DeadlineChange\DeadlineChangeModel());
$this->addModel(new \Nemundo\Workflow\App\WorkflowTemplate\Data\File\FileModel());
$this->addModel(new \Nemundo\Workflow\App\WorkflowTemplate\Data\SendInbox\SendInboxModel());
$this->addModel(new \Nemundo\Workflow\App\WorkflowTemplate\Data\SubjectChange\SubjectChangeModel());
$this->addModel(new \Nemundo\Workflow\App\WorkflowTemplate\Data\UserAssignmentChange\UserAssignmentChangeModel());
$this->addModel(new \Nemundo\Workflow\App\WorkflowTemplate\Data\UserDeadlineAssignment\UserDeadlineAssignmentModel());
$this->addModel(new \Nemundo\Workflow\App\WorkflowTemplate\Data\WorkflowAbort\WorkflowAbortModel());
}
}