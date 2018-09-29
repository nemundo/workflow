<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey3;
class Survey3ListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var Survey3Model
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new Survey3Model();
$this->label = $this->model->label;
}
}