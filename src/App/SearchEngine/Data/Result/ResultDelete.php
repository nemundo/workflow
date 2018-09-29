<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Result;
class ResultDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ResultModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ResultModel();
}
}