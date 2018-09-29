<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SendInbox;
use Nemundo\Model\Form\ModelFormUpdate;
class SendInboxFormUpdate extends ModelFormUpdate {
/**
* @var SendInboxModel
*/
public $model;

protected function loadCom() {
$this->model = new SendInboxModel();
}
}