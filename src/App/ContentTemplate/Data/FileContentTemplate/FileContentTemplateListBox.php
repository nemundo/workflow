<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\FileContentTemplate;
class FileContentTemplateListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var FileContentTemplateModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new FileContentTemplateModel();
$this->label = $this->model->label;
}
}