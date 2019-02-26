<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeTextContentTemplate;
class LargeTextContentTemplateListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var LargeTextContentTemplateModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new LargeTextContentTemplateModel();
$this->label = $this->model->label;
}
}