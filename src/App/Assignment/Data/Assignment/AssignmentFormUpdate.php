<?php
namespace Nemundo\Workflow\App\Assignment\Data\Assignment;
use Nemundo\Model\Form\ModelFormUpdate;
class AssignmentFormUpdate extends ModelFormUpdate {
/**
* @var AssignmentModel
*/
public $model;

protected function loadCom() {
$this->model = new AssignmentModel();
}
}