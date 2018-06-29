<?php
namespace Nemundo\Workflow\App\Identification\Data\IdentificationType;
class IdentificationTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var IdentificationTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new IdentificationTypeModel();
}
}