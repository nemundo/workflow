<?php
namespace Nemundo\Workflow\App\Stream\Data\StreamGroup;
class StreamGroupPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var StreamGroupModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new StreamGroupModel();
}
}