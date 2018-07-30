<?php
namespace Nemundo\Workflow\App\Inbox\Data\Inbox;
class InboxListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var InboxModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new InboxModel();
$this->label = $this->model->label;
}
}