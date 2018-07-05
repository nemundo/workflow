<?php
namespace Nemundo\Workflow\App\Message\Data\MessageText;
class MessageTextAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var MessageTextModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  MessageTextModel();
}
}