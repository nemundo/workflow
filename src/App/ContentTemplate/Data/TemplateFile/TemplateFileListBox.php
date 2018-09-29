<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateFile;
class TemplateFileListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var TemplateFileModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new TemplateFileModel();
$this->label = $this->model->label;
}
}