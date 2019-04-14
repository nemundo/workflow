<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigNumber;
class UserConfigNumberListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var UserConfigNumberModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new UserConfigNumberModel();
$this->label = $this->model->label;
}
}