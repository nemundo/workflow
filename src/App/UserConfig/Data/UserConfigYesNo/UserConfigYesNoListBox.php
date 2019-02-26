<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigYesNo;
class UserConfigYesNoListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var UserConfigYesNoModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new UserConfigYesNoModel();
$this->label = $this->model->label;
}
}