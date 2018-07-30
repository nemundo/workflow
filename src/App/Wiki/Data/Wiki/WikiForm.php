<?php
namespace Nemundo\Workflow\App\Wiki\Data\Wiki;
class WikiForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var WikiModel
*/
public $model;

protected function loadCom() {
$this->model = new WikiModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}