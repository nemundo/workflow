<?php
namespace Nemundo\Workflow\App\Workflow\Data\Workflow;
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