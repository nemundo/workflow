<?php
namespace Nemundo\Workflow\App\Widget\Data\Widget;
class WidgetPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var WidgetModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new WidgetModel();
}
}