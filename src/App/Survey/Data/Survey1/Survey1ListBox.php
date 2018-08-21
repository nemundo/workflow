<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey1;
class Survey1ListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var Survey1Model
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new Survey1Model();
$this->label = $this->model->label;
}
}