<?php
namespace Nemundo\Workflow\App\Calendar\Data\Calendar;
class CalendarForm extends \Nemundo\Design\Bootstrap\Form\BootstrapModelForm {
/**
* @var CalendarModel
*/
public $model;

protected function loadCom() {
$this->model = new CalendarModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}