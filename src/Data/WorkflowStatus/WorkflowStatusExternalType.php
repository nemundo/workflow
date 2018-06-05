<?php
namespace Nemundo\Workflow\Data\WorkflowStatus;
class WorkflowStatusExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $workflowStatus;

/**
* @var \Nemundo\Model\Type\Php\PhpClassType
*/
public $workflowStatusClass;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $workflowStatusText;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = WorkflowStatusModel::class;
$this->externalTableName = "workflow_workflow_status";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->workflowStatus = new \Nemundo\Model\Type\Text\TextType();
$this->workflowStatus->fieldName = "workflow_status";
$this->workflowStatus->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->workflowStatus->aliasFieldName = $this->workflowStatus->tableName . "_" . $this->workflowStatus->fieldName;
$this->workflowStatus->label = "Workflow Status";
$this->addType($this->workflowStatus);

$this->workflowStatusClass = new \Nemundo\Model\Type\Php\PhpClassType();
$this->workflowStatusClass->fieldName = "workflow_status_class";
$this->workflowStatusClass->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->workflowStatusClass->aliasFieldName = $this->workflowStatusClass->tableName . "_" . $this->workflowStatusClass->fieldName;
$this->workflowStatusClass->label = "Workflow Status Class";
$this->addType($this->workflowStatusClass);

$this->workflowStatusText = new \Nemundo\Model\Type\Text\LargeTextType();
$this->workflowStatusText->fieldName = "workflow_status_text";
$this->workflowStatusText->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->workflowStatusText->aliasFieldName = $this->workflowStatusText->tableName . "_" . $this->workflowStatusText->fieldName;
$this->workflowStatusText->label = "Workflow Status Text";
$this->addType($this->workflowStatusText);

}
}