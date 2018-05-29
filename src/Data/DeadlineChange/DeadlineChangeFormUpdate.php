<?php
namespace Nemundo\Workflow\Data\DeadlineChange;
use Nemundo\Model\Form\ModelFormUpdate;
class DeadlineChangeFormUpdate extends ModelFormUpdate {
/**
* @var DeadlineChangeModel
*/
public $model;

protected function loadCom() {
$this->model = new DeadlineChangeModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}