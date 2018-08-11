<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiContentType;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class WikiContentTypeTable extends BootstrapModelTable {
/**
* @var WikiContentTypeModel
*/
public $model;

protected function loadCom() {
$this->model = new WikiContentTypeModel();
}
}