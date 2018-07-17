<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeText;
class LargeTextPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var LargeTextModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new LargeTextModel();
}
}