<?php
namespace Nemundo\Workflow\App\Assignment\Data\Assignment;
class AssignmentForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var AssignmentModel
*/
public $model;

protected function loadCom() {
$this->model = new AssignmentModel();
}
}