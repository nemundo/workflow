<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationFilter;
use Nemundo\Model\View\ModelView;
class NotificationFilterView extends ModelView {
/**
* @var NotificationFilterModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new NotificationFilterModel();
}
}