<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey3;
class Survey3Form extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var Survey3Model
*/
public $model;

protected function loadCom() {
$this->model = new Survey3Model();
}
}