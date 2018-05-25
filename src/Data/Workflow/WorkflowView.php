<?php
namespace Nemundo\Workflow\Data\Workflow;
use Nemundo\Model\View\ModelView;
class WorkflowView extends ModelView {
/**
* @var WorkflowModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WorkflowModel();
}
}