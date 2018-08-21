<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey1;
class Survey1Model extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "survey_survey1";
$this->aliasTableName = "survey_survey1";
$this->label = "Survey1";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "survey_survey1";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "survey_survey1_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->name = new \Nemundo\Model\Type\Text\TextType($this);
$this->name->tableName = "survey_survey1";
$this->name->fieldName = "name";
$this->name->aliasFieldName = "survey_survey1_name";
$this->name->label = "Name";
$this->name->allowNullValue = "";
$this->name->length = 255;

$this->vorname = new \Nemundo\Model\Type\Text\TextType($this);
$this->vorname->tableName = "survey_survey1";
$this->vorname->fieldName = "vorname";
$this->vorname->aliasFieldName = "survey_survey1_vorname";
$this->vorname->label = "Vorname";
$this->vorname->allowNullValue = "";
$this->vorname->length = 255;

}
}