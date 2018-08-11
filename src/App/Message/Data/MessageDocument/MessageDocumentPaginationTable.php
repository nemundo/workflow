<?php
namespace Nemundo\Workflow\App\Message\Data\MessageDocument;
class MessageDocumentPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var MessageDocumentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new MessageDocumentModel();
}
}