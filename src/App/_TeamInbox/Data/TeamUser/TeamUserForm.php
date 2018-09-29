<?php
namespace Nemundo\Workflow\App\TeamInbox\Data\TeamUser;
class TeamUserForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var TeamUserModel
*/
public $model;

protected function loadCom() {
$this->model = new TeamUserModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}