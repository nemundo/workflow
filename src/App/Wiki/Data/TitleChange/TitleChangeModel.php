<?php
namespace Nemundo\Workflow\App\Wiki\Data\TitleChange;
class TitleChangeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $title;

protected function loadModel() {
$this->tableName = "wiki_title_change";
$this->aliasTableName = "wiki_title_change";
$this->label = "Title Change";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "wiki_title_change";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "wiki_title_change_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->title = new \Nemundo\Model\Type\Text\TextType($this);
$this->title->tableName = "wiki_title_change";
$this->title->fieldName = "title";
$this->title->aliasFieldName = "wiki_title_change_title";
$this->title->label = "Title";
$this->title->allowNullValue = "";
$this->title->length = 255;

}
}