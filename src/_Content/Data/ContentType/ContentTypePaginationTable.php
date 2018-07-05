<?php
namespace Nemundo\App\Content\Data\ContentType;
class ContentTypePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var ContentTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new ContentTypeModel();
}
}