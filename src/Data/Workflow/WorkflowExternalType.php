<?php
namespace Nemundo\Workflow\Data\Workflow;
class WorkflowExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\PrefixAutoNumberType
*/
public $workflowNumber;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = WorkflowModel::class;
$this->externalTableName = "workflow_workflow";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->workflowNumber = new \Nemundo\Model\Type\Number\PrefixAutoNumberType();
$this->workflowNumber->fieldName = "workflow_number";
$this->workflowNumber->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->workflowNumber->aliasFieldName = $this->workflowNumber->tableName . "_" . $this->workflowNumber->fieldName;
$this->workflowNumber->label = "Workflow Number";
$this->workflowNumber->createObject();
$this->addType($this->workflowNumber);

}
}