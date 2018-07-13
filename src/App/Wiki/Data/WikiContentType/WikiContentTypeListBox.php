<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContentType;
class WikiContentTypeListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var WikiContentTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WikiContentTypeModel();
$this->label = $this->model->label;
}
}