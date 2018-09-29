<?php
namespace Nemundo\Workflow\App\Task\Data\SourceTask;
class SourceTaskForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var SourceTaskModel
*/
public $model;

protected function loadCom() {
$this->model = new SourceTaskModel();
}
}