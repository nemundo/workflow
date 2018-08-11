<?php
namespace Nemundo\Workflow\App\Identification\Data\IdentificationType;
class IdentificationTypePaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var IdentificationTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new IdentificationTypeModel();
}
/**
* @return IdentificationTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new IdentificationTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}