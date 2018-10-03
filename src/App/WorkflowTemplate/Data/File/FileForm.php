<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\File;
class FileForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var FileModel
*/
public $model;

protected function loadCom() {
$this->model = new FileModel();
}
}