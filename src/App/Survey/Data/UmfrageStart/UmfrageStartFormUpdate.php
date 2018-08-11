<?php
namespace Nemundo\Workflow\App\Survey\Data\UmfrageStart;
use Nemundo\Model\Form\ModelFormUpdate;
class UmfrageStartFormUpdate extends ModelFormUpdate {
/**
* @var UmfrageStartModel
*/
public $model;

protected function loadCom() {
$this->model = new UmfrageStartModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}