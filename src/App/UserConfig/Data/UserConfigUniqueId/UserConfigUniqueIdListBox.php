<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigUniqueId;
class UserConfigUniqueIdListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var UserConfigUniqueIdModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new UserConfigUniqueIdModel();
$this->label = $this->model->label;
}
}