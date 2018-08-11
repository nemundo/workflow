<?php
namespace Nemundo\Workflow\App\Wiki\Data\Mail;
use Nemundo\Model\View\ModelView;
class MailView extends ModelView {
/**
* @var MailModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new MailModel();
}
}