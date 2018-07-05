<?php
namespace Nemundo\Workflow\App\Message\Data\MessageTo;
class MessageToPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var MessageToModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new MessageToModel();
}
}