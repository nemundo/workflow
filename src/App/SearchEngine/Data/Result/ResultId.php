<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Result;
use Nemundo\Model\Id\AbstractModelIdValue;
class ResultId extends AbstractModelIdValue {
/**
* @var ResultModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ResultModel();
}
}