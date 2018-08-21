<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey2;
class Survey2Form extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var Survey2Model
*/
public $model;

protected function loadCom() {
$this->model = new Survey2Model();
}
}