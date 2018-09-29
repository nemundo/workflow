<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey3;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class Survey3Table extends BootstrapModelTable {
/**
* @var Survey3Model
*/
public $model;

protected function loadCom() {
$this->model = new Survey3Model();
}
}