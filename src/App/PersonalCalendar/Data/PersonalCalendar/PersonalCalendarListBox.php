<?php
namespace Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendar;
class PersonalCalendarListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var PersonalCalendarModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new PersonalCalendarModel();
$this->label = $this->model->label;
}
}