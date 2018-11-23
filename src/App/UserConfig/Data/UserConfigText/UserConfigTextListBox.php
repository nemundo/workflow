<?php
namespace Nemundo\Workflow\App\UserConfig\Data\UserConfigText;
class UserConfigTextListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var UserConfigTextModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new UserConfigTextModel();
$this->label = $this->model->label;
}
}