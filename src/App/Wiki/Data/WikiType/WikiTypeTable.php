<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiType;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class WikiTypeTable extends BootstrapModelTable {
/**
* @var WikiTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new WikiTypeModel();
}
}