<?php
namespace Nemundo\Workflow\App\Identification\Data\IdentificationType;
class IdentificationTypeBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var IdentificationTypeModel
*/
protected $model;

/**
* @var string
*/
public $id;

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
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->identification, $this->identification);
$this->typeValueList->setModelValue($this->model->identificationTypeClass, $this->identificationTypeClass);
$id = parent::save();
return $id;
}
}