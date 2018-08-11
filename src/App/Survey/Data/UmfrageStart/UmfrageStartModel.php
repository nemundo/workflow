<?php
namespace Nemundo\Workflow\App\Survey\Data\UmfrageStart;
class UmfrageStartModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
$this->tableName = "survey_umfrage_start";
$this->aliasTableName = "survey_umfrage_start";
$this->label = "Umfrage Start";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "survey_umfrage_start";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "survey_umfrage_start_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->name = new \Nemundo\Model\Type\Text\TextType($this);
$this->name->tableName = "survey_umfrage_start";
$this->name->fieldName = "name";
$this->name->aliasFieldName = "survey_umfrage_start_name";
$this->name->label = "Name";
$this->name->allowNullValue = "";
$this->name->length = 255;

$this->vorname = new \Nemundo\Model\Type\Text\TextType($this);
$this->vorname->tableName = "survey_umfrage_start";
$this->vorname->fieldName = "vorname";
$this->vorname->aliasFieldName = "survey_umfrage_start_vorname";
$this->vorname->label = "Vorname";
$this->vorname->allowNullValue = "";
$this->vorname->length = 255;

}
}