<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\File;
class FileModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\File\RedirectFilenameType
*/
public $file;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $delete;

protected function loadModel() {
$this->tableName = "workflow_template_file";
$this->aliasTableName = "workflow_template_file";
$this->label = "File";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "workflow_template_file";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "workflow_template_file_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->file = new \Nemundo\Model\Type\File\RedirectFilenameType($this);
$this->file->tableName = "workflow_template_file";
$this->file->fieldName = "file";
$this->file->aliasFieldName = "workflow_template_file_file";
$this->file->label = "File";
$this->file->allowNullValue = false;
$this->file->redirectSite = \Nemundo\Workflow\App\WorkflowTemplate\Data\File\Redirect\FileRedirectConfig::$redirectFileFileSite;

$this->delete = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->delete->tableName = "workflow_template_file";
$this->delete->fieldName = "delete";
$this->delete->aliasFieldName = "workflow_template_file_delete";
$this->delete->label = "Delete";
$this->delete->allowNullValue = false;

}
}