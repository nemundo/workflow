<?php
namespace Nemundo\Workflow\App\Message\Data\MessageDocument;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class MessageDocumentTable extends BootstrapModelTable {
/**
* @var MessageDocumentModel
*/
public $model;

protected function loadCom() {
$this->model = new MessageDocumentModel();
}
}