<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\DeadlineChange;
use Nemundo\Model\Form\ModelFormUpdate;
class DeadlineChangeFormUpdate extends ModelFormUpdate {
/**
* @var DeadlineChangeModel
*/
public $model;

protected function loadCom() {
$this->model = new DeadlineChangeModel();
}
}