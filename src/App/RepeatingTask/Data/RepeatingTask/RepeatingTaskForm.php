<?php
namespace Nemundo\Workflow\App\RepeatingTask\Data\RepeatingTask;
class RepeatingTaskForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var RepeatingTaskModel
*/
public $model;

protected function loadCom() {
$this->model = new RepeatingTaskModel();
}
}