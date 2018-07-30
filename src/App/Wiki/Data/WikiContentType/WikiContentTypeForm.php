<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContentType;
class WikiContentTypeForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var WikiContentTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new WikiContentTypeModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}