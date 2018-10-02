<?php
namespace Nemundo\Workflow\App\Assignment\Data\AssignmentFilter;
use Nemundo\Model\Site\AbstractModelAdminSite;
class AssignmentFilterAdminSite extends \Nemundo\Model\Site\AbstractModelAdminSite {
/**
* @var AssignmentFilterModel
*/
public $model;

protected function loadSite() {
$this->model = new AssignmentFilterModel();
$this->title = $this->model->label;
$this->url = $this->model->tableName;
}
}