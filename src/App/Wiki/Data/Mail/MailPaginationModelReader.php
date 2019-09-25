<?php
namespace Nemundo\Workflow\App\Wiki\Data\Mail;
class MailPaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var MailModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MailModel();
}
/**
* @return MailRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new MailRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}