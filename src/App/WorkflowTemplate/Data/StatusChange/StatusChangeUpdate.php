<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\StatusChange;
use Nemundo\Model\Data\AbstractModelUpdate;
class StatusChangeUpdate extends AbstractModelUpdate {
/**
* @var StatusChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StatusChangeModel();
}
public function update() {
parent::update();
}
}