<?php
namespace Nemundo\Workflow\App\Message\Data\MessageTo;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class MessageToTable extends BootstrapModelTable {
/**
* @var MessageToModel
*/
public $model;

protected function loadCom() {
$this->model = new MessageToModel();
}
}