<?php
namespace Nemundo\Workflow\App\Notification\Data\Notification;
use Nemundo\Model\Site\AbstractModelAdminSite;
class NotificationAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var NotificationModel
*/
public $model;

protected function loadSite() {
$this->model = new NotificationModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}