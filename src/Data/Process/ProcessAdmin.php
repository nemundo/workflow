<?php
namespace Nemundo\Workflow\Data\Process;
class ProcessAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var ProcessModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  ProcessModel();
}
}