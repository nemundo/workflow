<?php
namespace Nemundo\Workflow\App\Message\Data\Message;
class MessagePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var MessageModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new MessageModel();
}
}