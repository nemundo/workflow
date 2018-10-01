<?php
namespace Nemundo\Workflow\App\MailConfig\Data\MailConfig;
class MailConfigAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var MailConfigModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  MailConfigModel();
}
}