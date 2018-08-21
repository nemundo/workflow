<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey3;
class Survey3ExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\UniqueIdType
*/
public $dataId;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $artikel;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $artikelnr;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = Survey3Model::class;
$this->externalTableName = "survey_survey3";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->dataId = new \Nemundo\Model\Type\Id\UniqueIdType();
$this->dataId->fieldName = "data_id";
$this->dataId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dataId->aliasFieldName = $this->dataId->tableName . "_" . $this->dataId->fieldName;
$this->dataId->label = "Id";
$this->addType($this->dataId);

$this->artikel = new \Nemundo\Model\Type\Text\TextType();
$this->artikel->fieldName = "artikel";
$this->artikel->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->artikel->aliasFieldName = $this->artikel->tableName . "_" . $this->artikel->fieldName;
$this->artikel->label = "Artikel";
$this->addType($this->artikel);

$this->artikelnr = new \Nemundo\Model\Type\Text\TextType();
$this->artikelnr->fieldName = "artikel_nr";
$this->artikelnr->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->artikelnr->aliasFieldName = $this->artikelnr->tableName . "_" . $this->artikelnr->fieldName;
$this->artikelnr->label = "Artikel Nr";
$this->addType($this->artikelnr);

}
}