<?php
namespace Nemundo\Workflow\App\Message\Data\MessageImage;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class MessageImageTable extends BootstrapModelTable {
/**
* @var MessageImageModel
*/
public $model;

protected function loadCom() {
$this->model = new MessageImageModel();
}
}