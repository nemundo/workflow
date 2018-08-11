<?php
namespace Nemundo\Workflow\App\Message\Data\MessageItem;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class MessageItemTable extends BootstrapModelTable {
/**
* @var MessageItemModel
*/
public $model;

protected function loadCom() {
$this->model = new MessageItemModel();
}
}