<?php
namespace Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendar;
use Nemundo\Model\Data\AbstractModelUpdate;
class PersonalCalendarUpdate extends AbstractModelUpdate {
/**
* @var PersonalCalendarModel
*/
public $model;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $date;

/**
* @var string
*/
public $subject;

public function __construct() {
parent::__construct();
$this->model = new PersonalCalendarModel();
$this->date = new \Nemundo\Core\Type\DateTime\Date();
}
public function update() {
$property = new \Nemundo\Model\Data\Property\DateTime\DateDataProperty($this->model->date, $this->typeValueList);
$property->setValue($this->date);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
parent::update();
}
}