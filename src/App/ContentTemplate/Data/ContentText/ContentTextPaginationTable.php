<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentText;
class ContentTextPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var ContentTextModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new ContentTextModel();
}
}