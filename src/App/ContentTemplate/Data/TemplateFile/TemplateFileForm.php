<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateFile;
class TemplateFileForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var TemplateFileModel
*/
public $model;

protected function loadCom() {
$this->model = new TemplateFileModel();
}
}