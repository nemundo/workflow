<?php
namespace Nemundo\Workflow\App\Message\Data\MessageType;
class MessageTypeAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var MessageTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  MessageTypeModel();
}
}