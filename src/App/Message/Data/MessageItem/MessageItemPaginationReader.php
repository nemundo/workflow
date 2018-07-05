<?php
namespace Nemundo\Workflow\App\Message\Data\MessageItem;
class MessageItemPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var MessageItemModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MessageItemModel();
}
/**
* @return MessageItemRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new MessageItemRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}