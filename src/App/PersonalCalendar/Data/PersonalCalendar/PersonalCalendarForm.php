<?php
namespace Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendar;
class PersonalCalendarForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var PersonalCalendarModel
*/
public $model;

protected function loadCom() {
$this->model = new PersonalCalendarModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}