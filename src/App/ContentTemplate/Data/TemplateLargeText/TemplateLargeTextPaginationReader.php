<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateLargeText;
class TemplateLargeTextPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var TemplateLargeTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TemplateLargeTextModel();
}
/**
* @return TemplateLargeTextRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new TemplateLargeTextRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}