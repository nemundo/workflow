<?php
namespace Nemundo\Workflow\App\News\Data\Comment;
class CommentModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
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

protected function loadModel() {
$this->tableName = "news_comment";
$this->aliasTableName = "news_comment";
$this->label = "Comment";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "news_comment";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "news_comment_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->newsId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->newsId->tableName = "news_comment";
$this->newsId->fieldName = "news";
$this->newsId->aliasFieldName = "news_comment_news";
$this->newsId->label = "News";
$this->loadNews();

$this->comment = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->comment->tableName = "news_comment";
$this->comment->fieldName = "comment";
$this->comment->aliasFieldName = "news_comment_comment";
$this->comment->label = "Comment";
$this->comment->validation = true;
$this->comment->allowNullValue = "";

}
public function loadNews() {
if ($this->news == null) {
$this->news = new \Nemundo\Workflow\App\News\Data\News\NewsExternalType($this, "news_comment_news");
$this->news->tableName = "news_comment";
$this->news->fieldName = "news";
$this->news->aliasFieldName = "news_comment_news";
$this->news->label = "News";
$this->news->visible->form = false;
}
}
}