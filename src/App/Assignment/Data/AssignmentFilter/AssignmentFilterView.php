<?php
namespace Nemundo\Workflow\App\Assignment\Data\AssignmentFilter;
use Nemundo\Model\View\ModelView;
class AssignmentFilterView extends ModelView {
/**
* @var AssignmentFilterModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new AssignmentFilterModel();
}
}