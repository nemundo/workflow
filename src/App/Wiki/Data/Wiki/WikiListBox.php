<?php
namespace Nemundo\Workflow\App\Wiki\Data\Wiki;
class WikiListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var WikiModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WikiModel();
$this->label = $this->model->label;
}
}