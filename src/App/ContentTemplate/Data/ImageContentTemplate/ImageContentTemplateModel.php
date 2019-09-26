<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ImageContentTemplate;
class ImageContentTemplateModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

protected function loadModel() {
$this->tableName = "content_template_imagecontenttemplate";
$this->aliasTableName = "content_template_imagecontenttemplate";
$this->label = "ImageContentTemplate";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_template_imagecontenttemplate";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_template_imagecontenttemplate_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

}
}