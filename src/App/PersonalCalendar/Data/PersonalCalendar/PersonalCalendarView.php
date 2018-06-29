<?php
namespace Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendar;
use Nemundo\Model\View\ModelView;
class PersonalCalendarView extends ModelView {
/**
* @var PersonalCalendarModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new PersonalCalendarModel();
}
}