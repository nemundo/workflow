<?php
namespace Nemundo\Workflow\App\Message\Data\MessageDocument;
class MessageDocumentAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var MessageDocumentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  MessageDocumentModel();
}
}