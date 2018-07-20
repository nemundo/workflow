<?php
namespace Nemundo\Workflow\App\Wiki\Data\TitleChange;
class TitleChangeForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var TitleChangeModel
*/
public $model;

protected function loadCom() {
$this->model = new TitleChangeModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}