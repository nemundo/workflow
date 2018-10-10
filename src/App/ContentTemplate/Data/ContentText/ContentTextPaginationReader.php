<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentText;
class ContentTextPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var ContentTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentTextModel();
}
/**
* @return ContentTextRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ContentTextRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}