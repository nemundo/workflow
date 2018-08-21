<?php
namespace Nemundo\Workflow\Content\Data\ContentType;
class ContentTypeForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var ContentTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new ContentTypeModel();
}
}