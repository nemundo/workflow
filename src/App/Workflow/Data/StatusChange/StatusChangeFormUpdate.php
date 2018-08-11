<?php
namespace Nemundo\Workflow\App\Workflow\Data\StatusChange;
use Nemundo\Model\Form\ModelFormUpdate;
class StatusChangeFormUpdate extends ModelFormUpdate {
/**
* @var StatusChangeModel
*/
public $model;

protected function loadCom() {
$this->model = new StatusChangeModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}