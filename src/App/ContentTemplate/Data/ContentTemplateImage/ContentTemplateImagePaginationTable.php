<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateImage;
class ContentTemplateImagePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var ContentTemplateImageModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new ContentTemplateImageModel();
}
}