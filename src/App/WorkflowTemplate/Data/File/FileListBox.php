<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\File;
class FileListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var FileModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new FileModel();
$this->label = $this->model->label;
}
}