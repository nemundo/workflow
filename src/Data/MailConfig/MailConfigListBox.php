<?php
namespace Nemundo\Workflow\Data\MailConfig;
class MailConfigListBox extends \Nemundo\Design\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var MailConfigModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new MailConfigModel();
$this->label = $this->model->label;
}
}