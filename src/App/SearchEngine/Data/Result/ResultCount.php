<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Result;
class ResultCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ResultModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ResultModel();
}
}