<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TemplateFile;
class TemplateFileModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\File\RedirectFilenameType
*/
public $file;

protected function loadModel() {
$this->tableName = "content_template_templatefile";
$this->aliasTableName = "content_template_templatefile";
$this->label = "TemplateFile";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_template_templatefile";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_template_templatefile_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->file = new \Nemundo\Model\Type\File\RedirectFilenameType($this);
$this->file->tableName = "content_template_templatefile";
$this->file->fieldName = "file";
$this->file->aliasFieldName = "content_template_templatefile_file";
$this->file->label = "File";
$this->file->allowNullValue = "";
$this->file->redirectSite = \Nemundo\Workflow\App\ContentTemplate\Data\TemplateFile\Redirect\TemplateFileRedirectConfig::$redirectTemplateFileFileSite;

}
}