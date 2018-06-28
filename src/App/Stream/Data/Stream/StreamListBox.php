<?php
namespace Nemundo\Workflow\App\Stream\Data\Stream;
class StreamListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var StreamModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new StreamModel();
$this->label = $this->model->label;
}
}