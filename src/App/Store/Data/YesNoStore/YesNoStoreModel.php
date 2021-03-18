<?php
namespace Nemundo\Workflow\App\Store\Data\YesNoStore;
class YesNoStoreModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $value;

protected function loadModel() {
$this->tableName = "store_yes_no";
$this->aliasTableName = "store_yes_no";
$this->label = "YesNoStore";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "store_yes_no";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "store_yes_no_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
/*$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;*/

$this->value = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->value->tableName = "store_yes_no";
$this->value->fieldName = "value";
$this->value->aliasFieldName = "store_yes_no_value";
$this->value->label = "Value";
$this->value->allowNullValue = false;

}
}