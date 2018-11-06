<?php
namespace Nemundo\Workflow\App\Identification\Data\IdentificationType;
class IdentificationTypeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var IdentificationTypeModel
*/
public $model;

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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->identification = $this->getModelValue($model->identification);
$this->identificationTypeClass = $this->getModelValue($model->identificationTypeClass);
}
/**
* @return \Nemundo\Workflow\App\Identification\Type\AbstractIdentificationType
*/
public function getIdentificationTypeClassObject() {
$object = (new \Nemundo\Core\System\ObjectBuilder)->getObject($this->identificationTypeClass);
return $object;
}
}