<?php
namespace Nemundo\Workflow\Data\Workflow;
class Workflow extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var WorkflowModel
*/
protected $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowModel();
}
public function save() {
$id = parent::save();
return $id;
}
}