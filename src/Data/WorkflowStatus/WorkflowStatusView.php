<?php
namespace Nemundo\Workflow\Data\WorkflowStatus;
use Nemundo\Model\View\ModelView;
class WorkflowStatusView extends ModelView {
/**
* @var WorkflowStatusModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WorkflowStatusModel();
}
}