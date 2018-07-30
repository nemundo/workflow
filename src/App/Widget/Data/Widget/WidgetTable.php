<?php
namespace Nemundo\Workflow\App\Widget\Data\Widget;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class WidgetTable extends BootstrapModelTable {
/**
* @var WidgetModel
*/
public $model;

protected function loadCom() {
$this->model = new WidgetModel();
}
}