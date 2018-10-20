<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TextContentTemplate;
class TextContentTemplateForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var TextContentTemplateModel
*/
public $model;

protected function loadCom() {
$this->model = new TextContentTemplateModel();
}
}