<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContentType;
class WikiContentTypeAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var WikiContentTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  WikiContentTypeModel();
}
}