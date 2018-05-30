<?php
namespace Nemundo\Workflow\Data\UserAssignmentChange;
use Nemundo\Model\View\ModelView;
class UserAssignmentChangeView extends ModelView {
/**
* @var UserAssignmentChangeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new UserAssignmentChangeModel();
}
}