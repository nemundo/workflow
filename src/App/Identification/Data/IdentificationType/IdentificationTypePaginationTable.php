<?php
namespace Nemundo\Workflow\App\Identification\Data\IdentificationType;
class IdentificationTypePaginationTable extends \Nemundo\Model\Table\AbstractModelPaginationTable {
/**
* @var IdentificationTypeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new IdentificationTypeModel();
}
}