<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContentType;
class WikiContentTypePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var WikiContentTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WikiContentTypeModel();
}
}