<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroup;
class StreamGroupListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var StreamGroupModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new StreamGroupModel();
$this->label = $this->model->label;
}
}