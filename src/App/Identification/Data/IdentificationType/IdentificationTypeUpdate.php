<?php
namespace Nemundo\Workflow\App\Identification\Data\IdentificationType;
use Nemundo\Model\Data\AbstractModelUpdate;
class IdentificationTypeUpdate extends AbstractModelUpdate {
/**
* @var IdentificationTypeModel
*/
public $model;

/**
* @var string
*/
public $identification;

/**
* @var string
*/
public $identificationTypeClass;

public function __construct() {
parent::__construct();
$this->model = new IdentificationTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->identification, $this->identification);
$this->typeValueList->setModelValue($this->model->identificationTypeClass, $this->identificationTypeClass);
parent::update();
}
}