<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SendInbox;
class SendInboxForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var SendInboxModel
*/
public $model;

protected function loadCom() {
$this->model = new SendInboxModel();
}
}