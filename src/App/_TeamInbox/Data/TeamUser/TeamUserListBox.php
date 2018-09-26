<?php
namespace Nemundo\Workflow\App\TeamInbox\Data\TeamUser;
class TeamUserListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var TeamUserModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new TeamUserModel();
$this->label = $this->model->label;
}
}