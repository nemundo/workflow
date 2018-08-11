<?php
namespace Nemundo\Workflow\App\Inbox\Data\Inbox;
class InboxAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var InboxModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  InboxModel();
}
}