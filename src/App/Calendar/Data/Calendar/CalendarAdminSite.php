<?php
namespace Nemundo\Workflow\App\Calendar\Data\Calendar;
use Nemundo\Model\Site\AbstractModelAdminSite;
class CalendarAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var CalendarModel
*/
public $model;

protected function loadSite() {
$this->model = new CalendarModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}