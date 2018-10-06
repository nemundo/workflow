<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\StatusChange;
class StatusChangeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var StatusChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StatusChangeModel();
}
}