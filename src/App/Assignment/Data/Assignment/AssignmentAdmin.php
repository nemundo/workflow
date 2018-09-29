<?php
namespace Nemundo\Workflow\App\Assignment\Data\Assignment;
class AssignmentAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var AssignmentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  AssignmentModel();
}
}