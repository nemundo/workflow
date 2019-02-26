<?php
namespace Nemundo\Workflow\App\Workflow\Data\Process;
class ProcessListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var ProcessModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new ProcessModel();
$this->label = $this->model->label;
}
}