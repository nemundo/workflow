<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\StatusChange;
use Nemundo\Model\Form\ModelFormUpdate;
class StatusChangeFormUpdate extends ModelFormUpdate {
/**
* @var StatusChangeModel
*/
public $model;

protected function loadCom() {
$this->model = new StatusChangeModel();
}
}