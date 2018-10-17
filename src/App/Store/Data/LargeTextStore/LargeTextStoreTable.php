<?php
namespace Nemundo\Workflow\App\Store\Data\LargeTextStore;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class LargeTextStoreTable extends BootstrapModelTable {
/**
* @var LargeTextStoreModel
*/
public $model;

protected function loadCom() {
$this->model = new LargeTextStoreModel();
}
}