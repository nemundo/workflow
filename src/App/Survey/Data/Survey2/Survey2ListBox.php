<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey2;
class Survey2ListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var Survey2Model
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new Survey2Model();
$this->label = $this->model->label;
}
}