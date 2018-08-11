<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateImage;
class ContentTemplateImagePaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var ContentTemplateImageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentTemplateImageModel();
}
/**
* @return ContentTemplateImageRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ContentTemplateImageRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}