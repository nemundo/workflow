<?php
namespace Nemundo\Workflow\Data\Workflow;
class WorkflowAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var WorkflowModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  WorkflowModel();
}
}