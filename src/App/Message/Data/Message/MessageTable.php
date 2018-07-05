<?php
namespace Nemundo\Workflow\App\Message\Data\Message;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class MessageTable extends BootstrapModelTable {
/**
* @var MessageModel
*/
public $model;

protected function loadCom() {
$this->model = new MessageModel();
}
}