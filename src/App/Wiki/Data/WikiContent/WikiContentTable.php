<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContent;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class WikiContentTable extends BootstrapModelTable {
/**
* @var WikiContentModel
*/
public $model;

protected function loadCom() {
$this->model = new WikiContentModel();
}
}