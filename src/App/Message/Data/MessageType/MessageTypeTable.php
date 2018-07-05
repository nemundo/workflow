<?php
namespace Nemundo\Workflow\App\Message\Data\MessageType;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class MessageTypeTable extends BootstrapModelTable {
/**
* @var MessageTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new MessageTypeModel();
}
}