<?php
namespace Nemundo\Workflow\App\RepeatingTask\Data\RepeatingTask;
class RepeatingTaskAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var RepeatingTaskModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  RepeatingTaskModel();
}
}