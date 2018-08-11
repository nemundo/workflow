<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContentType;
class WikiContentTypePaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var WikiContentTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WikiContentTypeModel();
}
/**
* @return WikiContentTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new WikiContentTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}