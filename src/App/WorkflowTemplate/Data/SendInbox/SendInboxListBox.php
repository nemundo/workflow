<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SendInbox;
class SendInboxListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var SendInboxModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new SendInboxModel();
$this->label = $this->model->label;
}
}