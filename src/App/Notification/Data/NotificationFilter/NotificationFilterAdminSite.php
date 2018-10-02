<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationFilter;
use Nemundo\Model\Site\AbstractModelAdminSite;
class NotificationFilterAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var NotificationFilterModel
*/
public $model;

protected function loadSite() {
$this->model = new NotificationFilterModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}