<?php
namespace Nemundo\Workflow\Data\MailConfig;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class MailConfigTable extends BootstrapModelTable {
/**
* @var MailConfigModel
*/
public $model;

protected function loadCom() {
$this->model = new MailConfigModel();
}
}