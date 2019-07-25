<?php
namespace Nemundo\Workflow\App\Store\Data\YesNoStore;
class YesNoStoreExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $value;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = YesNoStoreModel::class;
$this->externalTableName = "store_yes_no";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->value = new \Nemundo\Model\Type\Number\YesNoType();
$this->value->fieldName = "value";
$this->value->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->value->aliasFieldName = $this->value->tableName . "_" . $this->value->fieldName;
$this->value->label = "Value";
$this->addType($this->value);

}
}