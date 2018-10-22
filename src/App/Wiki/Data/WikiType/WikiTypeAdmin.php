<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiType;
class WikiTypeAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var WikiTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  WikiTypeModel();
}
}