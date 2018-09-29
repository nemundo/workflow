<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey2;
class Survey2Model extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $bemerkungen;

protected function loadModel() {
$this->tableName = "survey_survey2";
$this->aliasTableName = "survey_survey2";
$this->label = "Survey2";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "survey_survey2";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "survey_survey2_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->bemerkungen = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->bemerkungen->tableName = "survey_survey2";
$this->bemerkungen->fieldName = "bemerkungen";
$this->bemerkungen->aliasFieldName = "survey_survey2_bemerkungen";
$this->bemerkungen->label = "Bemerkungen";
$this->bemerkungen->allowNullValue = "";

}
}