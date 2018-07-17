<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateImage;
class ContentTemplateImageForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var ContentTemplateImageModel
*/
public $model;

protected function loadCom() {
$this->model = new ContentTemplateImageModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}