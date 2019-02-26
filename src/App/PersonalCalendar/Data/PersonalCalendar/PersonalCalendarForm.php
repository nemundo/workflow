<?php
namespace Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendar;
class PersonalCalendarForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var PersonalCalendarModel
*/
public $model;

protected function loadContainer() {
$this->model = new PersonalCalendarModel();
}
}