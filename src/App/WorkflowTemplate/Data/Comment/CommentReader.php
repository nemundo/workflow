<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\Comment;
class CommentReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var CommentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CommentModel();
}
/**
* @return CommentRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return CommentRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return CommentRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new CommentRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}