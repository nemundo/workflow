<?php
namespace Nemundo\Workflow\App\Wiki\Data\Wiki;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class WikiTable extends BootstrapModelTable {
/**
* @var WikiModel
*/
public $model;

protected function loadCom() {
$this->model = new WikiModel();
}
}