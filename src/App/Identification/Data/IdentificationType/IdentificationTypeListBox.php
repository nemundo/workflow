<?php
namespace Nemundo\Workflow\App\Identification\Data\IdentificationType;
class IdentificationTypeListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var IdentificationTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new IdentificationTypeModel();
$this->label = $this->model->label;
}
}