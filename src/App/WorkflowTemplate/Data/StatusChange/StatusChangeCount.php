<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\StatusChange;
class StatusChangeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var StatusChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StatusChangeModel();
}
}