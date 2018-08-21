<?php
namespace Nemundo\Workflow\App\Stream\Data\Stream;
class StreamForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var StreamModel
*/
public $model;

protected function loadCom() {
$this->model = new StreamModel();
}
}