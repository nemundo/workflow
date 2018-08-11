<?php
namespace Nemundo\Workflow\App\PersonalTask\Data\PersonalTask;
use Nemundo\Model\View\ModelView;
class PersonalTaskView extends ModelView {
/**
* @var PersonalTaskModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new PersonalTaskModel();
}
}