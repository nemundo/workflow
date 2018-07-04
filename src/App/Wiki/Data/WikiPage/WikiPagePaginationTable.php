<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiPage;
class WikiPagePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var WikiPageModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WikiPageModel();
}
}