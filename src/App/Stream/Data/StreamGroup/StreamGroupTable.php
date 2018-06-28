<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroup;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class StreamGroupTable extends BootstrapModelTable {
/**
* @var StreamGroupModel
*/
public $model;

protected function loadCom() {
$this->model = new StreamGroupModel();
}
}