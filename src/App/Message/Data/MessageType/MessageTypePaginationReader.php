<?php
namespace Nemundo\Workflow\App\Message\Data\MessageType;
class MessageTypePaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var MessageTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MessageTypeModel();
}
/**
* @return MessageTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new MessageTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}