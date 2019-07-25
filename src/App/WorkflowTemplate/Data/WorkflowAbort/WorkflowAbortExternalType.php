<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\WorkflowAbort;
class WorkflowAbortExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $reason;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = WorkflowAbortModel::class;
$this->externalTableName = "workflow_template_workflow_abort";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->reason = new \Nemundo\Model\Type\Text\LargeTextType();
$this->reason->fieldName = "reason";
$this->reason->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->reason->aliasFieldName = $this->reason->tableName . "_" . $this->reason->fieldName;
$this->reason->label = "Begründung";
$this->addType($this->reason);

}
}