<?php
namespace Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendar;
class PersonalCalendarValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var PersonalCalendarModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PersonalCalendarModel();
}
}