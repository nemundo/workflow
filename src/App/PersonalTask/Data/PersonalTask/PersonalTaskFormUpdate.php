<?php
namespace Nemundo\Workflow\App\PersonalTask\Data\PersonalTask;
use Nemundo\Model\Form\ModelFormUpdate;
class PersonalTaskFormUpdate extends ModelFormUpdate {
/**
* @var PersonalTaskModel
*/
public $model;

protected function loadCom() {
$this->model = new PersonalTaskModel();
}
}