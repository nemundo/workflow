<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\SearchIndex;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class SearchIndexTable extends BootstrapModelTable {
/**
* @var SearchIndexModel
*/
public $model;

protected function loadCom() {
$this->model = new SearchIndexModel();
}
}