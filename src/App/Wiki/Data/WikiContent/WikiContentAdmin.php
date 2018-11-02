<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContent;
class WikiContentAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var WikiContentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  WikiContentModel();
}
}