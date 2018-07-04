<?php
namespace Nemundo\Workflow\App\News\Data\News;
class NewsModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "news_news";
$this->aliasTableName = "news_news";
$this->label = "News";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "news_news";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "news_news_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->title = new \Nemundo\Model\Type\Text\TextType($this);
$this->title->tableName = "news_news";
$this->title->fieldName = "title";
$this->title->aliasFieldName = "news_news_title";
$this->title->label = "Title";
$this->title->validation = true;
$this->title->allowNullValue = "";
$this->title->length = 255;

$this->text = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->text->tableName = "news_news";
$this->text->fieldName = "text";
$this->text->aliasFieldName = "news_news_text";
$this->text->label = "Text";
$this->text->allowNullValue = "";

}
}