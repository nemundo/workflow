<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiPage;
class WikiPageModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $title;

protected function loadModel() {
$this->tableName = "wiki_wiki_page";
$this->aliasTableName = "wiki_wiki_page";
$this->label = "Wiki Page";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "wiki_wiki_page";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "wiki_wiki_page_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->title = new \Nemundo\Model\Type\Text\TextType($this);
$this->title->tableName = "wiki_wiki_page";
$this->title->fieldName = "title";
$this->title->aliasFieldName = "wiki_wiki_page_title";
$this->title->label = "Title";
$this->title->validation = true;
$this->title->allowNullValue = "";
$this->title->length = 255;

}
}