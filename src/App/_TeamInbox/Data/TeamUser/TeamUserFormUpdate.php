<?php
namespace Nemundo\Workflow\App\TeamInbox\Data\TeamUser;
use Nemundo\Model\Form\ModelFormUpdate;
class TeamUserFormUpdate extends ModelFormUpdate {
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