<?php
namespace Nemundo\Workflow\App\Widget\Data\WidgetType;
class WidgetTypePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var WidgetTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WidgetTypeModel();
}
}