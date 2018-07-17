<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeText;
class LargeTextListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var LargeTextModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new LargeTextModel();
$this->label = $this->model->label;
}
}