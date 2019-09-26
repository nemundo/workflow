<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Word;
class WordModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $word;

protected function loadModel() {
$this->tableName = "searchengine_word";
$this->aliasTableName = "searchengine_word";
$this->label = "Word";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "searchengine_word";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "searchengine_word_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->word = new \Nemundo\Model\Type\Text\TextType($this);
$this->word->tableName = "searchengine_word";
$this->word->fieldName = "word";
$this->word->aliasFieldName = "searchengine_word_word";
$this->word->label = "Word";
$this->word->allowNullValue = false;
$this->word->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "";
$index->addType($this->word);

}
}