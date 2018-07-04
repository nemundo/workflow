<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiPage;
class WikiPageAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var WikiPageModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  WikiPageModel();
}
}