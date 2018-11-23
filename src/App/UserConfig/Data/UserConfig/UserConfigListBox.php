<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfig;
class UserConfigListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var UserConfigModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new UserConfigModel();
$this->label = $this->model->label;
}
}