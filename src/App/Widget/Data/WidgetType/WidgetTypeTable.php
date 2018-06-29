<?php
namespace Nemundo\Workflow\App\Widget\Data\WidgetType;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class WidgetTypeTable extends BootstrapModelTable {
/**
* @var WidgetTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new WidgetTypeModel();
}
}