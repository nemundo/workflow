<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\File;
class FileListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var FileModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new FileModel();
$this->label = $this->model->label;
}
}