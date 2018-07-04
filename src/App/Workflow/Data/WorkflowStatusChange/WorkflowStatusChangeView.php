<?php
namespace Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange;
use Nemundo\Model\View\ModelView;
class WorkflowStatusChangeView extends ModelView {
/**
* @var WorkflowStatusChangeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WorkflowStatusChangeModel();
}
}