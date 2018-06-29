<?php
namespace Nemundo\Workflow\App\Identification\Data\IdentificationType;
class IdentificationTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "identification_identification_type";
$this->aliasTableName = "identification_identification_type";
$this->label = "Identification Type";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "identification_identification_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "identification_identification_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->identification = new \Nemundo\Model\Type\Text\TextType($this);
$this->identification->tableName = "identification_identification_type";
$this->identification->fieldName = "identification";
$this->identification->aliasFieldName = "identification_identification_type_identification";
$this->identification->label = "Identification";
$this->identification->allowNullValue = "";
$this->identification->length = 255;

$this->identificationTypeClass = new \Nemundo\Model\Type\Php\PhpClassType($this);
$this->identificationTypeClass->tableName = "identification_identification_type";
$this->identificationTypeClass->fieldName = "identification_type_class";
$this->identificationTypeClass->aliasFieldName = "identification_identification_type_identification_type_class";
$this->identificationTypeClass->label = "Identification Type Class";
$this->identificationTypeClass->allowNullValue = "";
$this->identificationTypeClass->phpClassName = Nemundo\Workflow\App\Identification\Type\AbstractIdentificationType::class;

}
}