<?php
namespace Nemundo\Workflow\App\Wiki\Data\Hyperlink;
class HyperlinkForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var HyperlinkModel
*/
public $model;

protected function loadCom() {
$this->model = new HyperlinkModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}