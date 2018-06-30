<?php
namespace Nemundo\Workflow\App\Widget\Data\Widget;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class WidgetTable extends BootstrapModelTable {
/**
* @var WidgetModel
*/
public $model;

protected function loadCom() {
$this->model = new WidgetModel();
}
}