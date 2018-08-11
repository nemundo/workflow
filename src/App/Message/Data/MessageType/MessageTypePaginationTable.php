<?php
namespace Nemundo\Workflow\App\Message\Data\MessageType;
class MessageTypePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var MessageTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new MessageTypeModel();
}
}