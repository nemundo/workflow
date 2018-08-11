<?php
namespace Nemundo\Workflow\App\Identification\Data\IdentificationType;
use Nemundo\Model\Id\AbstractModelIdValue;
class IdentificationTypeId extends AbstractModelIdValue {
/**
* @var IdentificationTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new IdentificationTypeModel();
}
}