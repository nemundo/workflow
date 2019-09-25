<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Document;
class DocumentPaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var DocumentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DocumentModel();
}
/**
* @return DocumentRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new DocumentRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}