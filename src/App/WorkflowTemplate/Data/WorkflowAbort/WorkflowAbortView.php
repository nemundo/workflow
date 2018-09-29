<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\WorkflowAbort;
use Nemundo\Model\View\ModelView;
class WorkflowAbortView extends ModelView {
/**
* @var WorkflowAbortModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WorkflowAbortModel();
}
}