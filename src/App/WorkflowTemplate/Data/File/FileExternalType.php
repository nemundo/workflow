<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\File;
class FileExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadType() {
parent::loadType();
$this->externalModelClassName = FileModel::class;
$this->externalTableName = "workflow_template_file";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->file = new \Nemundo\Model\Type\File\RedirectFilenameType();
$this->file->fieldName = "file";
$this->file->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->file->aliasFieldName = $this->file->tableName . "_" . $this->file->fieldName;
$this->file->label = "File";
$this->file->createObject();
$this->addType($this->file);

$this->delete = new \Nemundo\Model\Type\Number\YesNoType();
$this->delete->fieldName = "delete";
$this->delete->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->delete->aliasFieldName = $this->delete->tableName . "_" . $this->delete->fieldName;
$this->delete->label = "Delete";
$this->addType($this->delete);

}
}