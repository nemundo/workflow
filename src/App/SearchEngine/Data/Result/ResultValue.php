<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Result;
class ResultValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ResultModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ResultModel();
}
}