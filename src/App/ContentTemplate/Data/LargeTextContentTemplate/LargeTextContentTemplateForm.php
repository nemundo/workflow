<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeTextContentTemplate;
class LargeTextContentTemplateForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var LargeTextContentTemplateModel
*/
public $model;

protected function loadCom() {
$this->model = new LargeTextContentTemplateModel();
}
}