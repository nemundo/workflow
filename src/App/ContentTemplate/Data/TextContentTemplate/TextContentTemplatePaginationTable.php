<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TextContentTemplate;
class TextContentTemplatePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var TextContentTemplateModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new TextContentTemplateModel();
}
}