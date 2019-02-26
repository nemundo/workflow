<?php
namespace Nemundo\Workflow\App\Calendar\Data\Calendar;
class CalendarListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var CalendarModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new CalendarModel();
$this->label = $this->model->label;
}
}