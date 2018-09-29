<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SendInbox;
use Nemundo\Model\View\ModelView;
class SendInboxView extends ModelView {
/**
* @var SendInboxModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new SendInboxModel();
}
}