<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey2;
class Survey2Admin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var Survey2Model
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  Survey2Model();
}
}