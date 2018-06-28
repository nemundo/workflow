<?php
namespace Nemundo\Workflow\Content\Data\ContentType;
class ContentTypeListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var ContentTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new ContentTypeModel();
$this->label = $this->model->label;
}
}