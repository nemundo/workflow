<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey1;
class Survey1ExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $name;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $vorname;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = Survey1Model::class;
$this->externalTableName = "survey_survey1";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->name = new \Nemundo\Model\Type\Text\TextType();
$this->name->fieldName = "name";
$this->name->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->name->aliasFieldName = $this->name->tableName . "_" . $this->name->fieldName;
$this->name->label = "Name";
$this->addType($this->name);

$this->vorname = new \Nemundo\Model\Type\Text\TextType();
$this->vorname->fieldName = "vorname";
$this->vorname->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->vorname->aliasFieldName = $this->vorname->tableName . "_" . $this->vorname->fieldName;
$this->vorname->label = "Vorname";
$this->addType($this->vorname);

}
}