<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey3;
class Survey3Admin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var Survey3Model
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  Survey3Model();
}
}