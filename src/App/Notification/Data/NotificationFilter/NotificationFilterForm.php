<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationFilter;
class NotificationFilterForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var NotificationFilterModel
*/
public $model;

protected function loadCom() {
$this->model = new NotificationFilterModel();
}
}