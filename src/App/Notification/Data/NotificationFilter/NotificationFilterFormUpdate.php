<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationFilter;
use Nemundo\Model\Form\ModelFormUpdate;
class NotificationFilterFormUpdate extends ModelFormUpdate {
/**
* @var NotificationFilterModel
*/
public $model;

protected function loadCom() {
$this->model = new NotificationFilterModel();
}
}