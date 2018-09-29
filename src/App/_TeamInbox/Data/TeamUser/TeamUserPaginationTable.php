<?php
namespace Nemundo\Workflow\App\TeamInbox\Data\TeamUser;
class TeamUserPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var TeamUserModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new TeamUserModel();
}
}