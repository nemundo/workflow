<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentText;
class ContentTextListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var ContentTextModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new ContentTextModel();
$this->label = $this->model->label;
}
}