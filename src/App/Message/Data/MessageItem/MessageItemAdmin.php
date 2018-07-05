<?php
namespace Nemundo\Workflow\App\Message\Data\MessageItem;
class MessageItemAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var MessageItemModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  MessageItemModel();
}
}