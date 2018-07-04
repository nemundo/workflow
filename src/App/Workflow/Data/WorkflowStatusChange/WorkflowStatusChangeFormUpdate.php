<?php
namespace Nemundo\Workflow\App\Workflow\Data\WorkflowStatusChange;
use Nemundo\Model\Form\ModelFormUpdate;
class WorkflowStatusChangeFormUpdate extends ModelFormUpdate {
/**
* @var WorkflowStatusChangeModel
*/
public $model;

protected function loadCom() {
$this->model = new WorkflowStatusChangeModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}