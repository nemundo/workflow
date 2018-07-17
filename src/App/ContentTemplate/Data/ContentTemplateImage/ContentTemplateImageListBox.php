<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateImage;
class ContentTemplateImageListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var ContentTemplateImageModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new ContentTemplateImageModel();
$this->label = $this->model->label;
}
}