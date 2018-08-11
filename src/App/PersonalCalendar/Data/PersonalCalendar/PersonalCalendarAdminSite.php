<?php
namespace Nemundo\Workflow\App\PersonalCalendar\Data\PersonalCalendar;
use Nemundo\Model\Site\AbstractModelAdminSite;
class PersonalCalendarAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var PersonalCalendarModel
*/
public $model;

protected function loadSite() {
$this->model = new PersonalCalendarModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}