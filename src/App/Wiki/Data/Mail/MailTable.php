<?php
namespace Nemundo\Workflow\App\Wiki\Data\Mail;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class MailTable extends BootstrapModelTable {
/**
* @var MailModel
*/
public $model;

protected function loadCom() {
$this->model = new MailModel();
}
}