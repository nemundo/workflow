<?php
namespace Nemundo\Workflow\App\Workflow\Data\Workflow;
use Nemundo\Model\Form\ModelFormUpdate;
class WorkflowFormUpdate extends ModelFormUpdate {
/**
* @var WorkflowModel
*/
public $model;

protected function loadCom() {
$this->model = new WorkflowModel();
}
}