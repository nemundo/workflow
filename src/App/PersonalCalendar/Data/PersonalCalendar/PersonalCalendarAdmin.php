<?php
namespace Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendar;
class PersonalCalendarAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var PersonalCalendarModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new  PersonalCalendarModel();
}
}