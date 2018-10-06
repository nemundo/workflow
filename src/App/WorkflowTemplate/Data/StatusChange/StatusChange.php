<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\StatusChange;
class StatusChange extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var StatusChangeModel
*/
protected $model;

public function __construct() {
parent::__construct();
$this->model = new StatusChangeModel();
}
public function save() {
$id = parent::save();
return $id;
}
}