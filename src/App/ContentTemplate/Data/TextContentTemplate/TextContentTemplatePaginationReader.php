<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TextContentTemplate;
class TextContentTemplatePaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var TextContentTemplateModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextContentTemplateModel();
}
/**
* @return TextContentTemplateRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new TextContentTemplateRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}