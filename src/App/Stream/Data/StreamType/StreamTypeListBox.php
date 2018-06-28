<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamType;
class StreamTypeListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var StreamTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new StreamTypeModel();
$this->label = $this->model->label;
}
}