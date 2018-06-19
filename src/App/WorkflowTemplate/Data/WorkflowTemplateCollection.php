<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class WorkflowTemplateCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\WorkflowTemplate\Data\Comment\CommentModel());
$this->addModel(new \Nemundo\Workflow\App\WorkflowTemplate\Data\DeadlineChange\DeadlineChangeModel());
$this->addModel(new \Nemundo\Workflow\App\WorkflowTemplate\Data\SubjectChange\SubjectChangeModel());
$this->addModel(new \Nemundo\Workflow\App\WorkflowTemplate\Data\UserAssignmentChange\UserAssignmentChangeModel());
}
}