<?php
namespace Nemundo\Workflow\App\Wiki\Data\Mail;
class MailAdmin extends \Nemundo\Model\Admin\AbstractModelAdmin {
/**
* @var MailModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new  MailModel();
}
}