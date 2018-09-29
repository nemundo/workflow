<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SendInbox;
class SendInboxPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var SendInboxModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new SendInboxModel();
}
}