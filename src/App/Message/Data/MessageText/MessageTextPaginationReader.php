<?php
namespace Nemundo\Workflow\App\Message\Data\MessageText;
class MessageTextPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var MessageTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MessageTextModel();
}
/**
* @return MessageTextRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new MessageTextRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}