<?php
namespace Nemundo\Workflow\App\Assignment\Data\AssignmentFilter;
use Nemundo\Model\Form\ModelFormUpdate;
class AssignmentFilterFormUpdate extends ModelFormUpdate {
/**
* @var AssignmentFilterModel
*/
public $model;

protected function loadCom() {
$this->model = new AssignmentFilterModel();
}
}