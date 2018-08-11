<?php
namespace Nemundo\Workflow\App\Wiki\Data\Mail;
class MailPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var MailModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new MailModel();
}
}