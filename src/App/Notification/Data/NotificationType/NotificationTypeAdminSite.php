<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationType;
use Nemundo\Model\Site\AbstractModelAdminSite;
class NotificationTypeAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var NotificationTypeModel
*/
public $model;

protected function loadSite() {
$this->model = new NotificationTypeModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}