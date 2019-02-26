<?php
namespace Nemundo\Workflow\App\Assignment\Data\Assignment;
class AssignmentListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var AssignmentModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new AssignmentModel();
$this->label = $this->model->label;
}
}