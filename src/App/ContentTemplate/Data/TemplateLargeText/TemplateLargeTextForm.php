<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateLargeText;
class TemplateLargeTextForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var TemplateLargeTextModel
*/
public $model;

protected function loadCom() {
$this->model = new TemplateLargeTextModel();
}
}