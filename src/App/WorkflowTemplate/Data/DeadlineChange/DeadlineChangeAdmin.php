<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\DeadlineChange;
class DeadlineChangeAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var DeadlineChangeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  DeadlineChangeModel();
}
}