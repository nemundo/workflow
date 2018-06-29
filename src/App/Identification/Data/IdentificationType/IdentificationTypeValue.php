<?php
namespace Nemundo\Workflow\App\Identification\Data\IdentificationType;
class IdentificationTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var IdentificationTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new IdentificationTypeModel();
}
}