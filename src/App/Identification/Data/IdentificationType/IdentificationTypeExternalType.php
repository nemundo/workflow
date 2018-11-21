<?php
namespace Nemundo\Workflow\App\Identification\Data\IdentificationType;
class IdentificationTypeExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $identification;

/**
* @var \Nemundo\Model\Type\Php\PhpClassType
*/
public $identificationTypeClass;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = IdentificationTypeModel::class;
$this->externalTableName = "identification_identification_type";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->identification = new \Nemundo\Model\Type\Text\TextType();
$this->identification->fieldName = "identification";
$this->identification->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->identification->aliasFieldName = $this->identification->tableName . "_" . $this->identification->fieldName;
$this->identification->label = "Identification";
$this->addType($this->identification);

$this->identificationTypeClass = new \Nemundo\Model\Type\Php\PhpClassType();
$this->identificationTypeClass->fieldName = "identification_type_class";
$this->identificationTypeClass->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->identificationTypeClass->aliasFieldName = $this->identificationTypeClass->tableName . "_" . $this->identificationTypeClass->fieldName;
$this->identificationTypeClass->label = "Identification Type Class";
$this->addType($this->identificationTypeClass);

}
}