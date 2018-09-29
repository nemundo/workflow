<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SendInbox;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class SendInboxTable extends BootstrapModelTable {
/**
* @var SendInboxModel
*/
public $model;

protected function loadCom() {
$this->model = new SendInboxModel();
}
}