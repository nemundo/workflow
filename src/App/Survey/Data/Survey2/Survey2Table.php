<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey2;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class Survey2Table extends BootstrapModelTable {
/**
* @var Survey2Model
*/
public $model;

protected function loadCom() {
$this->model = new Survey2Model();
}
}