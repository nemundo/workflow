<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeTextContentTemplate;
class LargeTextContentTemplatePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var LargeTextContentTemplateModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new LargeTextContentTemplateModel();
}
}