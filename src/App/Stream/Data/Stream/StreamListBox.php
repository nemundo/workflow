<?php
namespace Nemundo\Workflow\App\Stream\Data\Stream;
class StreamListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var StreamModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new StreamModel();
$this->label = $this->model->label;
}
}