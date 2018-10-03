<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\File;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class FileTable extends BootstrapModelTable {
/**
* @var FileModel
*/
public $model;

protected function loadCom() {
$this->model = new FileModel();
}
}