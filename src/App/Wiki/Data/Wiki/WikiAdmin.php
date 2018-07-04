<?php
namespace Nemundo\Workflow\App\Wiki\Data\Wiki;
class WikiAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var WikiModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  WikiModel();
}
}