<?php
namespace Nemundo\Workflow\App\Message\Data\MessageTo;
class MessageToAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var MessageToModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  MessageToModel();
}
}