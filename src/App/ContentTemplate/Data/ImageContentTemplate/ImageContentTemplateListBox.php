<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ImageContentTemplate;
class ImageContentTemplateListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var ImageContentTemplateModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new ImageContentTemplateModel();
$this->label = $this->model->label;
}
}