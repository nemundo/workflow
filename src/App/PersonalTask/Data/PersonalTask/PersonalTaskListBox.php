<?php
namespace Nemundo\Workflow\App\PersonalTask\Data\PersonalTask;
class PersonalTaskListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var PersonalTaskModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new PersonalTaskModel();
$this->label = $this->model->label;
}
}