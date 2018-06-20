<?php
namespace Nemundo\Workflow\Data\MailConfig;
class MailConfigPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var MailConfigModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new MailConfigModel();
}
}