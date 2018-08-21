<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey3;
class Survey3Model extends \Nemundo\App\Content\Model\AbstractDataIdModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $artikel;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $artikelnr;

protected function loadModel() {
$this->tableName = "survey_survey3";
$this->aliasTableName = "survey_survey3";
$this->label = "Survey3";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "survey_survey3";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "survey_survey3_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->id->visible->form = false;

$this->artikel = new \Nemundo\Model\Type\Text\TextType($this);
$this->artikel->tableName = "survey_survey3";
$this->artikel->fieldName = "artikel";
$this->artikel->aliasFieldName = "survey_survey3_artikel";
$this->artikel->label = "Artikel";
$this->artikel->allowNullValue = "";
$this->artikel->length = 255;

$this->artikelnr = new \Nemundo\Model\Type\Text\TextType($this);
$this->artikelnr->tableName = "survey_survey3";
$this->artikelnr->fieldName = "artikel_nr";
$this->artikelnr->aliasFieldName = "survey_survey3_artikel_nr";
$this->artikelnr->label = "Artikel Nr";
$this->artikelnr->allowNullValue = "";
$this->artikelnr->length = 255;

}
}