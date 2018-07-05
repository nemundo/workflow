<?php
namespace Nemundo\App\Content\Data\ContentType;
class ContentTypeForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var ContentTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new ContentTypeModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}