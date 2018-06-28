<?php
namespace Nemundo\Workflow\App\Stream\Data\Stream;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class StreamTable extends BootstrapModelTable {
/**
* @var StreamModel
*/
public $model;

protected function loadCom() {
$this->model = new StreamModel();
}
}