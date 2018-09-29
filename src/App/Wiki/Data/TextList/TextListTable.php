<?php
namespace Nemundo\Workflow\App\Wiki\Data\TextList;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class TextListTable extends BootstrapModelTable {
/**
* @var TextListModel
*/
public $model;

protected function loadCom() {
$this->model = new TextListModel();
}
}