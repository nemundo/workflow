<?php
namespace Nemundo\Workflow\App\Survey\Data\UmfrageStart;
class UmfrageStartAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var UmfrageStartModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  UmfrageStartModel();
}
}