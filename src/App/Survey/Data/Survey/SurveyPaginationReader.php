<?php
namespace Nemundo\Workflow\App\Survey\Data\Survey;
class SurveyPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var SurveyModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SurveyModel();
}
/**
* @return SurveyRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new SurveyRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}