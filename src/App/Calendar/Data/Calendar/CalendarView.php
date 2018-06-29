<?php
namespace Nemundo\Workflow\App\Calendar\Data\Calendar;
use Nemundo\Model\View\ModelView;
class CalendarView extends ModelView {
/**
* @var CalendarModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new CalendarModel();
}
}