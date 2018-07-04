<?php
namespace Nemundo\Workflow\App\Workflow\Data\WorkflowStatus;
use Nemundo\Model\Form\ModelFormUpdate;
class WorkflowStatusFormUpdate extends ModelFormUpdate {
/**
* @var WorkflowStatusModel
*/
public $model;

protected function loadCom() {
$this->model = new WorkflowStatusModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}