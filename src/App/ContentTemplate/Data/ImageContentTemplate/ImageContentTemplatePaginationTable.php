<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ImageContentTemplate;
class ImageContentTemplatePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var ImageContentTemplateModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new ImageContentTemplateModel();
}
}