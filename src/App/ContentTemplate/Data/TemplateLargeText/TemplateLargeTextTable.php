<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateLargeText;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class TemplateLargeTextTable extends BootstrapModelTable {
/**
* @var TemplateLargeTextModel
*/
public $model;

protected function loadCom() {
$this->model = new TemplateLargeTextModel();
}
}