<?php
namespace Nemundo\Workflow\App\Task\Data\SourceTask;
class SourceTaskCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var SourceTaskModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SourceTaskModel();
}
}