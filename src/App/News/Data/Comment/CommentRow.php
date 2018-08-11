<?php
namespace Nemundo\Workflow\App\News\Data\Comment;
class CommentRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $newsId;

/**
* @var \Nemundo\Workflow\App\News\Data\News\NewsRow
*/
public $news;

/**
* @var string
*/
public $comment;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->newsId = $this->getModelValue($model->newsId);
if ($model->news !== null) {
$this->loadNemundoWorkflowAppNewsDataNewsNewsnewsRow($model->news);
}
$this->comment = $this->getModelValue($model->comment);
}
private function loadNemundoWorkflowAppNewsDataNewsNewsnewsRow($model) {
$this->news = new \Nemundo\Workflow\App\News\Data\News\NewsRow($this->row, $model);
}
}