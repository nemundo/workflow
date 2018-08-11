<?php
namespace Nemundo\Workflow\Content\Data\ContentType;
class ContentTypePaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var ContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentTypeModel();
}
/**
* @return ContentTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ContentTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}