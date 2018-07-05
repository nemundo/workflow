<?php
namespace Nemundo\Workflow\App\Message\Data\MessageItem;
class MessageItemPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var MessageItemModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new MessageItemModel();
}
}