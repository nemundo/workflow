<?php
namespace Nemundo\Workflow\App\Message\Data\MessageImage;
class MessageImageAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var MessageImageModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  MessageImageModel();
}
}