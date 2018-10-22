<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiType;
class WikiTypeForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var WikiTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new WikiTypeModel();
}
}