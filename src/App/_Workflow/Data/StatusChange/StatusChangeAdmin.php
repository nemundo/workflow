<?php
namespace Nemundo\Workflow\App\Workflow\Data\StatusChange;
class StatusChangeAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var StatusChangeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  StatusChangeModel();
}
}