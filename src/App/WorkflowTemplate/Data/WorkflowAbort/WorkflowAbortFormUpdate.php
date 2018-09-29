<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\WorkflowAbort;
use Nemundo\Model\Form\ModelFormUpdate;
class WorkflowAbortFormUpdate extends ModelFormUpdate {
/**
* @var WorkflowAbortModel
*/
public $model;

protected function loadCom() {
$this->model = new WorkflowAbortModel();
}
}