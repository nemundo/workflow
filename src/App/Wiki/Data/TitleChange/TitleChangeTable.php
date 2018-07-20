<?php
namespace Nemundo\Workflow\App\Wiki\Data\TitleChange;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class TitleChangeTable extends BootstrapModelTable {
/**
* @var TitleChangeModel
*/
public $model;

protected function loadCom() {
$this->model = new TitleChangeModel();
}
}