<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\WorkflowAbort;
class WorkflowAbortAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var WorkflowAbortModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  WorkflowAbortModel();
}
}