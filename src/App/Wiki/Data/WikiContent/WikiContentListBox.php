<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContent;
class WikiContentListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var WikiContentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WikiContentModel();
$this->label = $this->model->label;
}
}