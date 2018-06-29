<?php
namespace Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendar;
class PersonalCalendarDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var PersonalCalendarModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PersonalCalendarModel();
}
}