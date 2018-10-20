<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeTextContentTemplate;
class LargeTextContentTemplateListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var LargeTextContentTemplateModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new LargeTextContentTemplateModel();
$this->label = $this->model->label;
}
}