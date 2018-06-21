<?php
namespace Nemundo\Workflow\App\TeamInbox\Data\TeamUser;
use Nemundo\Model\Site\AbstractModelAdminSite;
class TeamUserAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var TeamUserModel
*/
public $model;

protected function loadSite() {
$this->model = new TeamUserModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}