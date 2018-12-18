<?php
namespace Nemundo\Workflow\App\Wiki\Data\Mail;
class MailListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var MailModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new MailModel();
$this->label = $this->model->label;
}
}