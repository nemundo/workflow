<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\FileContentTemplate;
class FileContentTemplatePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var FileContentTemplateModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileContentTemplateModel();
}
/**
* @return FileContentTemplateRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new FileContentTemplateRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}