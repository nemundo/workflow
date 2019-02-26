<?php
namespace Nemundo\Workflow\App\Assignment\Data\AssignmentFilter;
class AssignmentFilterListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var AssignmentFilterModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AssignmentFilterModel();
$this->label = $this->model->label;
}
}