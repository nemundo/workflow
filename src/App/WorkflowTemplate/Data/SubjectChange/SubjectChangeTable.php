<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SubjectChange;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class SubjectChangeTable extends BootstrapModelTable {
/**
* @var SubjectChangeModel
*/
public $model;

protected function loadCom() {
$this->model = new SubjectChangeModel();
}
}