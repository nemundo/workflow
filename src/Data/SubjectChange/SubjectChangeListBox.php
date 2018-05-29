<?php
namespace Nemundo\Workflow\Data\SubjectChange;
class SubjectChangeListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var SubjectChangeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new SubjectChangeModel();
$this->label = $this->model->label;
}
}