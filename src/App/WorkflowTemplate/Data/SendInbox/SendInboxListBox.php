<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SendInbox;
class SendInboxListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var SendInboxModel
*/
public $model;

protected function loadContainer() {
parent::loadContainer();
$this->model = new SendInboxModel();
$this->label = $this->model->label;
}
}