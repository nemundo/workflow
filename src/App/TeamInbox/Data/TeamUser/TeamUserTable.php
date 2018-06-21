<?php
namespace Nemundo\Workflow\App\TeamInbox\Data\TeamUser;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class TeamUserTable extends BootstrapModelTable {
/**
* @var TeamUserModel
*/
public $model;

protected function loadCom() {
$this->model = new TeamUserModel();
}
}