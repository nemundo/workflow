<?php
namespace Nemundo\Workflow\App\Inbox\Data\Inbox;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class InboxTable extends BootstrapModelTable {
/**
* @var InboxModel
*/
public $model;

protected function loadCom() {
$this->model = new InboxModel();
}
}