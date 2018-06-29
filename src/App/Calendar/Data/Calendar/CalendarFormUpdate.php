<?php
namespace Nemundo\Workflow\App\Calendar\Data\Calendar;
use Nemundo\Model\Form\ModelFormUpdate;
class CalendarFormUpdate extends ModelFormUpdate {
/**
* @var CalendarModel
*/
public $model;

protected function loadCom() {
$this->model = new CalendarModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}