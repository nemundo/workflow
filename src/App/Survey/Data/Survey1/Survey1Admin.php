<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey1;
class Survey1Admin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var Survey1Model
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  Survey1Model();
}
}