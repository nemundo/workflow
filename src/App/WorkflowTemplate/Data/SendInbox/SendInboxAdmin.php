<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SendInbox;
class SendInboxAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var SendInboxModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  SendInboxModel();
}
}