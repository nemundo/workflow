<?php
namespace Nemundo\Workflow\App\Workflow\Data\UserNotification;
use Nemundo\Model\Site\AbstractModelAdminSite;
class UserNotificationAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var UserNotificationModel
*/
public $model;

protected function loadSite() {
$this->model = new UserNotificationModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}