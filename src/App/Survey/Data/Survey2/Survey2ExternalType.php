<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey2;
class Survey2ExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $bemerkungen;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = Survey2Model::class;
$this->externalTableName = "survey_survey2";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->bemerkungen = new \Nemundo\Model\Type\Text\LargeTextType();
$this->bemerkungen->fieldName = "bemerkungen";
$this->bemerkungen->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->bemerkungen->aliasFieldName = $this->bemerkungen->tableName . "_" . $this->bemerkungen->fieldName;
$this->bemerkungen->label = "Bemerkungen";
$this->addType($this->bemerkungen);

}
}