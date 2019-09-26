<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\FileContentTemplate;
class FileContentTemplateModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\File\RedirectFilenameType
*/
public $file;

protected function loadModel() {
$this->tableName = "content_template_filecontenttemplate";
$this->aliasTableName = "content_template_filecontenttemplate";
$this->label = "FileContentTemplate";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_template_filecontenttemplate";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_template_filecontenttemplate_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->file = new \Nemundo\Model\Type\File\RedirectFilenameType($this);
$this->file->tableName = "content_template_filecontenttemplate";
$this->file->fieldName = "file";
$this->file->aliasFieldName = "content_template_filecontenttemplate_file";
$this->file->label = "File";
$this->file->allowNullValue = false;
$this->file->redirectSite = \Nemundo\Workflow\App\ContentTemplate\Data\FileContentTemplate\Redirect\FileContentTemplateRedirectConfig::$redirectFileContentTemplateFileSite;

}
}