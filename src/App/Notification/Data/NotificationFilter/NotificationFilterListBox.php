<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationFilter;
class NotificationFilterListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var NotificationFilterModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new NotificationFilterModel();
$this->label = $this->model->label;
}
}