<?php
namespace Nemundo\Workflow\App\Workflow\Data\MailConfig;
use Nemundo\Model\Form\ModelFormUpdate;
class MailConfigFormUpdate extends ModelFormUpdate {
/**
* @var MailConfigModel
*/
public $model;

protected function loadCom() {
$this->model = new MailConfigModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}