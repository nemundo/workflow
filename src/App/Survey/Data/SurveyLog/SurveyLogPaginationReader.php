<?php
namespace Nemundo\Workflow\App\Survey\Data\SurveyLog;
class SurveyLogPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var SurveyLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SurveyLogModel();
}
/**
* @return SurveyLogRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new SurveyLogRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}