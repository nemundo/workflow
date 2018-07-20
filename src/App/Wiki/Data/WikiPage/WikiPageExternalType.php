<?php
namespace Nemundo\Workflow\App\Wiki\Data\WikiPage;
class WikiPageExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $title;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $count;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $url;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = WikiPageModel::class;
$this->externalTableName = "wiki_wiki_page";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->title = new \Nemundo\Model\Type\Text\TextType();
$this->title->fieldName = "title";
$this->title->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->title->aliasFieldName = $this->title->tableName . "_" . $this->title->fieldName;
$this->title->label = "Title";
$this->addType($this->title);

$this->count = new \Nemundo\Model\Type\Number\NumberType();
$this->count->fieldName = "count";
$this->count->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->count->aliasFieldName = $this->count->tableName . "_" . $this->count->fieldName;
$this->count->label = "Count";
$this->addType($this->count);

$this->url = new \Nemundo\Model\Type\Text\TextType();
$this->url->fieldName = "url";
$this->url->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->url->aliasFieldName = $this->url->tableName . "_" . $this->url->fieldName;
$this->url->label = "Url";
$this->addType($this->url);

}
}