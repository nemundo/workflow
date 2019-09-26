<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SubjectChange;
class SubjectChangeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $subject;

protected function loadModel() {
$this->tableName = "workflow_template_subject_change";
$this->aliasTableName = "workflow_template_subject_change";
$this->label = "Subject Change";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "workflow_template_subject_change";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "workflow_template_subject_change_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->subject = new \Nemundo\Model\Type\Text\TextType($this);
$this->subject->tableName = "workflow_template_subject_change";
$this->subject->fieldName = "subject";
$this->subject->aliasFieldName = "workflow_template_subject_change_subject";
$this->subject->label = "Subject";
$this->subject->validation = true;
$this->subject->allowNullValue = false;
$this->subject->length = 255;

}
}