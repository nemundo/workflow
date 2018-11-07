<?php
namespace Nemundo\Workflow\App\MailConfig\Data\MailConfig;
use Nemundo\Model\Form\ModelFormUpdate;
class MailConfigFormUpdate extends ModelFormUpdate {
/**
* @var MailConfigModel
*/
public $model;

protected function loadCom() {
$this->model = new MailConfigModel();
}
}