<?php
namespace Nemundo\Workflow\App\Survey\Data\UmfrageStart;
class UmfrageStartListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var UmfrageStartModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new UmfrageStartModel();
$this->label = $this->model->label;
}
}