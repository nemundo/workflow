<?php
namespace Nemundo\Workflow\App\Wiki\Data\Hyperlink;
class HyperlinkListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var HyperlinkModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new HyperlinkModel();
$this->label = $this->model->label;
}
}