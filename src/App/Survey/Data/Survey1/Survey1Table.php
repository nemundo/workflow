<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey1;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class Survey1Table extends BootstrapModelTable {
/**
* @var Survey1Model
*/
public $model;

protected function loadCom() {
$this->model = new Survey1Model();
}
}