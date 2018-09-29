<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateLargeText;
class TemplateLargeTextListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var TemplateLargeTextModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new TemplateLargeTextModel();
$this->label = $this->model->label;
}
}