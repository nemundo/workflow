<?php
namespace Nemundo\Workflow\App\TeamInbox\Data\TeamUser;
use Nemundo\Model\View\ModelView;
class TeamUserView extends ModelView {
/**
* @var TeamUserModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new TeamUserModel();
}
}