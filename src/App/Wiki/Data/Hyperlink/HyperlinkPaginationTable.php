<?php
namespace Nemundo\Workflow\App\Wiki\Data\Hyperlink;
class HyperlinkPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var HyperlinkModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new HyperlinkModel();
}
}