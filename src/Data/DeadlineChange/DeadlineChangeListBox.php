<?php
namespace Nemundo\Workflow\Data\DeadlineChange;
class DeadlineChangeListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var DeadlineChangeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new DeadlineChangeModel();
$this->label = $this->model->label;
}
}