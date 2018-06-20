<?php
namespace Nemundo\Workflow\Data\MailConfig;
class MailConfigPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var MailConfigModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MailConfigModel();
}
/**
* @return MailConfigRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new MailConfigRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}