<?php
namespace Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendar;
use Nemundo\Model\Form\ModelFormUpdate;
class PersonalCalendarFormUpdate extends ModelFormUpdate {
/**
* @var PersonalCalendarModel
*/
public $model;

protected function loadCom() {
$this->model = new PersonalCalendarModel();
}
}