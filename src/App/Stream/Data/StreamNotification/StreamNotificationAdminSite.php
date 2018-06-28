<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamNotification;
use Nemundo\Model\Site\AbstractModelAdminSite;
class StreamNotificationAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var StreamNotificationModel
*/
public $model;

protected function loadSite() {
$this->model = new StreamNotificationModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}