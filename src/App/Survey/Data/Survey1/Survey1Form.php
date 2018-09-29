<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey1;
class Survey1Form extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var Survey1Model
*/
public $model;

protected function loadCom() {
$this->model = new Survey1Model();
}
}