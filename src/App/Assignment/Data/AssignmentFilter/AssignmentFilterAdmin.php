<?php
namespace Nemundo\Workflow\App\Assignment\Data\AssignmentFilter;
class AssignmentFilterAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var AssignmentFilterModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  AssignmentFilterModel();
}
}