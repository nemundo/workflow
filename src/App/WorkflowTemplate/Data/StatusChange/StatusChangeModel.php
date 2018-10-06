<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\StatusChange;
class StatusChangeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

protected function loadModel() {
$this->tableName = "workflow_template_status_change";
$this->aliasTableName = "workflow_template_status_change";
$this->label = "Status Change";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "workflow_template_status_change";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "workflow_template_status_change_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

}
}