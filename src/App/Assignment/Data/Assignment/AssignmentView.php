<?php
namespace Nemundo\Workflow\App\Assignment\Data\Assignment;
use Nemundo\Model\View\ModelView;
class AssignmentView extends ModelView {
/**
* @var AssignmentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new AssignmentModel();
}
}