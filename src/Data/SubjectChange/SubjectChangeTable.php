<?php
namespace Nemundo\Workflow\Data\SubjectChange;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class SubjectChangeTable extends BootstrapModelTable {
/**
* @var SubjectChangeModel
*/
public $model;

protected function loadCom() {
$this->model = new SubjectChangeModel();
}
}