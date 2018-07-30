<?php
namespace Nemundo\Workflow\App\Message\Data\MessageText;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class MessageTextTable extends BootstrapModelTable {
/**
* @var MessageTextModel
*/
public $model;

protected function loadCom() {
$this->model = new MessageTextModel();
}
}