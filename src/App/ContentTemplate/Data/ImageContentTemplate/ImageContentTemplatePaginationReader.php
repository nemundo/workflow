<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ImageContentTemplate;
class ImageContentTemplatePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ImageContentTemplateModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageContentTemplateModel();
}
/**
* @return ImageContentTemplateRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ImageContentTemplateRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}