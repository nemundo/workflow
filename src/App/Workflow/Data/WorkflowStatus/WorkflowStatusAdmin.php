<?php
namespace Nemundo\Workflow\App\Workflow\Data\WorkflowStatus;
class WorkflowStatusAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var WorkflowStatusModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  WorkflowStatusModel();
}
}