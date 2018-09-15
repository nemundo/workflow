<?php
namespace Nemundo\Workflow\App\Wiki\Data\TextList;
class TextListPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var TextListModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new TextListModel();
}
}