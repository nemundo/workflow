<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeText;
class LargeTextForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var LargeTextModel
*/
public $model;

protected function loadCom() {
$this->model = new LargeTextModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}