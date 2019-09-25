<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeTextContentTemplate;
class LargeTextContentTemplatePaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var LargeTextContentTemplateModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LargeTextContentTemplateModel();
}
/**
* @return LargeTextContentTemplateRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new LargeTextContentTemplateRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}