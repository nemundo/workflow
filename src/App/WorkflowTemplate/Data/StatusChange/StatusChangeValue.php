<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\StatusChange;
class StatusChangeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var StatusChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StatusChangeModel();
}
}