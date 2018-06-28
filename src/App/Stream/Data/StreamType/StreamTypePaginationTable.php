<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamType;
class StreamTypePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var StreamTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new StreamTypeModel();
}
}