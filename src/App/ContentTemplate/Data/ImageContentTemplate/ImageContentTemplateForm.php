<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ImageContentTemplate;
class ImageContentTemplateForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var ImageContentTemplateModel
*/
public $model;

protected function loadCom() {
$this->model = new ImageContentTemplateModel();
}
}