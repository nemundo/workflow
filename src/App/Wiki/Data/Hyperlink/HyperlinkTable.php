<?php
namespace Nemundo\Workflow\App\Wiki\Data\Hyperlink;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class HyperlinkTable extends BootstrapModelTable {
/**
* @var HyperlinkModel
*/
public $model;

protected function loadCom() {
$this->model = new HyperlinkModel();
}
}