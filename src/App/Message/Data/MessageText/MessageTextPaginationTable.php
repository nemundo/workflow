<?php
namespace Nemundo\Workflow\App\Message\Data\MessageText;
class MessageTextPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var MessageTextModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new MessageTextModel();
}
}