<?php
namespace Nemundo\Workflow\App\Workflow\Data\MailConfig;
class MailConfigListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
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