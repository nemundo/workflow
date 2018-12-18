<?php
namespace Nemundo\Workflow\App\Wiki\Data\Hyperlink;
class HyperlinkModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $title;

/**
* @var \Nemundo\Model\Type\Web\UrlType
*/
public $url;

protected function loadModel() {
$this->tableName = "wiki_hyperlink";
$this->aliasTableName = "wiki_hyperlink";
$this->label = "Hyperlink";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "wiki_hyperlink";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "wiki_hyperlink_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->title = new \Nemundo\Model\Type\Text\TextType($this);
$this->title->tableName = "wiki_hyperlink";
$this->title->fieldName = "title";
$this->title->aliasFieldName = "wiki_hyperlink_title";
$this->title->label = "Title";
$this->title->allowNullValue = "";
$this->title->length = 255;

$this->url = new \Nemundo\Model\Type\Web\UrlType($this);
$this->url->tableName = "wiki_hyperlink";
$this->url->fieldName = "url";
$this->url->aliasFieldName = "wiki_hyperlink_url";
$this->url->label = "Url";
$this->url->allowNullValue = "";

}
}