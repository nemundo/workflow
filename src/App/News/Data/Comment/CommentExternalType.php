<?php
namespace Nemundo\Workflow\App\News\Data\Comment;
class CommentExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $newsId;

/**
* @var \Nemundo\Workflow\App\News\Data\News\NewsExternalType
*/
public $news;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $comment;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = CommentModel::class;
$this->externalTableName = "news_comment";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->newsId = new \Nemundo\Model\Type\Id\IdType();
$this->newsId->fieldName = "news";
$this->newsId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->newsId->aliasFieldName = $this->newsId->tableName ."_".$this->newsId->fieldName;
$this->newsId->label = "News";
$this->addType($this->newsId);

$this->comment = new \Nemundo\Model\Type\Text\LargeTextType();
$this->comment->fieldName = "comment";
$this->comment->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->comment->aliasFieldName = $this->comment->tableName . "_" . $this->comment->fieldName;
$this->comment->label = "Comment";
$this->addType($this->comment);

}
public function loadNews() {
if ($this->news == null) {
$this->news = new \Nemundo\Workflow\App\News\Data\News\NewsExternalType(null, $this->parentFieldName . "_news");
$this->news->fieldName = "news";
$this->news->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->news->aliasFieldName = $this->news->tableName ."_".$this->news->fieldName;
$this->news->label = "News";
$this->addType($this->news);
}
return $this;
}
}