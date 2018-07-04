<?php
namespace Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange;
class WorkflowStatusChangeAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var WorkflowStatusChangeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  WorkflowStatusChangeModel();
}
}