<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Document;
class DocumentPaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var DocumentModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new DocumentModel();
}
}