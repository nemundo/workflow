<?php
namespace Nemundo\Workflow\App\Inbox\Data\Inbox;
class InboxPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var InboxModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new InboxModel();
}
}