<?php
namespace Nemundo\Workflow\App\Task\Data\SourceTask;
class SourceTaskListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var SourceTaskModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new SourceTaskModel();
$this->label = $this->model->label;
}
}