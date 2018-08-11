<?php
namespace Nemundo\Workflow\App\Message\Data\Message;
class MessageAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var MessageModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  MessageModel();
}
}