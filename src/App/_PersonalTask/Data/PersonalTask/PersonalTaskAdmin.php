<?php
namespace Nemundo\Workflow\App\PersonalTask\Data\PersonalTask;
class PersonalTaskAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var PersonalTaskModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  PersonalTaskModel();
}
}