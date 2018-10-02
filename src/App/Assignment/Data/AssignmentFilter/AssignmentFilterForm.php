<?php
namespace Nemundo\Workflow\App\Assignment\Data\AssignmentFilter;
class AssignmentFilterForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var AssignmentFilterModel
*/
public $model;

protected function loadCom() {
$this->model = new AssignmentFilterModel();
}
}