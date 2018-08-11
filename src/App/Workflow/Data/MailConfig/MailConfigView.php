<?php
namespace Nemundo\Workflow\App\Workflow\Data\MailConfig;
use Nemundo\Model\View\ModelView;
class MailConfigView extends ModelView {
/**
* @var MailConfigModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new MailConfigModel();
}
}