<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeText;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class LargeTextTable extends BootstrapModelTable {
/**
* @var LargeTextModel
*/
public $model;

protected function loadCom() {
$this->model = new LargeTextModel();
}
}