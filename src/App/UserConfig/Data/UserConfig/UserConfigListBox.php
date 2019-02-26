<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfig;
class UserConfigListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var UserConfigModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new UserConfigModel();
$this->label = $this->model->label;
}
}