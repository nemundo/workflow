<?php
namespace Nemundo\Workflow\App\Notification\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class NotificationCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Workflow\App\Notification\Data\NotificationFilter\NotificationFilterModel());
$this->addModel(new \Nemundo\Workflow\App\Notification\Data\Notification\NotificationModel());
}
}