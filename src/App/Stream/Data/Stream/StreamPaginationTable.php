<?php
namespace Nemundo\Workflow\App\Stream\Data\Stream;
class StreamPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var StreamModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new StreamModel();
}
}