<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\File;
class FilePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var FileModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new FileModel();
}
}