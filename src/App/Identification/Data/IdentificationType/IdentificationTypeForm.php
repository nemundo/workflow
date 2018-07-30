<?php
namespace Nemundo\Workflow\App\Identification\Data\IdentificationType;
class IdentificationTypeForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var IdentificationTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new IdentificationTypeModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}