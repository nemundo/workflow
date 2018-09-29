<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Result;
class ResultModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $title;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $text;

/**
* @var \Nemundo\Model\Type\Id\UniqueIdType
*/
public $dataId;

protected function loadModel() {
$this->tableName = "searchengine_result";
$this->aliasTableName = "searchengine_result";
$this->label = "Result";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "searchengine_result";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "searchengine_result_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->title = new \Nemundo\Model\Type\Text\TextType($this);
$this->title->tableName = "searchengine_result";
$this->title->fieldName = "title";
$this->title->aliasFieldName = "searchengine_result_title";
$this->title->label = "Title";
$this->title->allowNullValue = "";
$this->title->length = 255;

$this->text = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->text->tableName = "searchengine_result";
$this->text->fieldName = "text";
$this->text->aliasFieldName = "searchengine_result_text";
$this->text->label = "Text";
$this->text->allowNullValue = "";

$this->dataId = new \Nemundo\Model\Type\Id\UniqueIdType($this);
$this->dataId->tableName = "searchengine_result";
$this->dataId->fieldName = "data_id";
$this->dataId->aliasFieldName = "searchengine_result_data_id";
$this->dataId->label = "Data Id";
$this->dataId->allowNullValue = "";
$this->dataId->visible->form = false;
$this->dataId->visible->table = false;
$this->dataId->visible->view = false;
$this->id->visible->form = false;

}
}