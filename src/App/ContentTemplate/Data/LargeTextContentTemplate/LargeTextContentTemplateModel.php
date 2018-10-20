<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\LargeTextContentTemplate;
class LargeTextContentTemplateModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $text;

protected function loadModel() {
$this->tableName = "content_template_largetextcontenttemplate";
$this->aliasTableName = "content_template_largetextcontenttemplate";
$this->label = "LargeTextContentTemplate";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_template_largetextcontenttemplate";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_template_largetextcontenttemplate_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->text = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->text->tableName = "content_template_largetextcontenttemplate";
$this->text->fieldName = "text";
$this->text->aliasFieldName = "content_template_largetextcontenttemplate_text";
$this->text->label = "Text";
$this->text->allowNullValue = "";

}
}