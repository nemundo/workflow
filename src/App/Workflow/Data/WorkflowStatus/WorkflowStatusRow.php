<?php
namespace Nemundo\Workflow\App\Workflow\Data\WorkflowStatus;
class WorkflowStatusRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $workflowStatus;

/**
* @var string
*/
public $workflowStatusClass;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->workflowStatus = $this->getModelValue($model->workflowStatus);
$this->workflowStatusClass = $this->getModelValue($model->workflowStatusClass);
}
/**
* @return \Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus
*/
public function getWorkflowStatusClassObject() {
$object = (new \Nemundo\Core\System\ObjectBuilder)->getObject($this->workflowStatusClass);
return $object;
}
}