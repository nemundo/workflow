<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamType;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class StreamTypeTable extends BootstrapModelTable {
/**
* @var StreamTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new StreamTypeModel();
}
}