<?php
namespace Nemundo\Workflow\Data\Workflow;
use Nemundo\Model\Form\ModelFormUpdate;
class WorkflowFormUpdate extends ModelFormUpdate {
/**
* @var WorkflowModel
*/
public $model;

protected function loadCom() {
$this->model = new WorkflowModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}