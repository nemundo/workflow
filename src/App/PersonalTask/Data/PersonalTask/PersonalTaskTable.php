<?php
namespace Nemundo\Workflow\App\PersonalTask\Data\PersonalTask;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class PersonalTaskTable extends BootstrapModelTable {
/**
* @var PersonalTaskModel
*/
public $model;

protected function loadCom() {
$this->model = new PersonalTaskModel();
}
}