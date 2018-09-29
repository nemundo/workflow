<?php
namespace Nemundo\Workflow\App\RepeatingTask\Data\RepeatingTask;
class RepeatingTaskListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var RepeatingTaskModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new RepeatingTaskModel();
$this->label = $this->model->label;
}
}