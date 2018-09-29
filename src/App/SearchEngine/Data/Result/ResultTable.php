<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Result;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class ResultTable extends BootstrapModelTable {
/**
* @var ResultModel
*/
public $model;

protected function loadCom() {
$this->model = new ResultModel();
}
}