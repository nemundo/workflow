<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SubjectChange;
use Nemundo\Model\Form\ModelFormUpdate;
class SubjectChangeFormUpdate extends ModelFormUpdate {
/**
* @var SubjectChangeModel
*/
public $model;

protected function loadCom() {
$this->model = new SubjectChangeModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}