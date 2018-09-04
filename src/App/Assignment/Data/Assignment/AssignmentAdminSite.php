<?php
namespace Nemundo\Workflow\App\Assignment\Data\Assignment;
use Nemundo\Model\Site\AbstractModelAdminSite;
class AssignmentAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var AssignmentModel
*/
public $model;

protected function loadSite() {
$this->model = new AssignmentModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}