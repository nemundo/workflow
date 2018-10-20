<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\FileContentTemplate;
class FileContentTemplateForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var FileContentTemplateModel
*/
public $model;

protected function loadCom() {
$this->model = new FileContentTemplateModel();
}
}