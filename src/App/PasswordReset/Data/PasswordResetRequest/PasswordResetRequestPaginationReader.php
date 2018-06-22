<?php
namespace Nemundo\Workflow\App\PasswordReset\Data\PasswordResetRequest;
class PasswordResetRequestPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var PasswordResetRequestModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PasswordResetRequestModel();
}
/**
* @return PasswordResetRequestRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new PasswordResetRequestRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}