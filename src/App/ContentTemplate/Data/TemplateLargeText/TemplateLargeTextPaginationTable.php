<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateLargeText;
class TemplateLargeTextPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var TemplateLargeTextModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new TemplateLargeTextModel();
}
}