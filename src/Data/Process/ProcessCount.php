<?php
namespace Nemundo\Workflow\Data\Process;
class ProcessCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ProcessModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ProcessModel();
}
}