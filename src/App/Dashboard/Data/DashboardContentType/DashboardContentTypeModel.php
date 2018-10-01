<?php
namespace Nemundo\Workflow\App\Dashboard\Data\DashboardContentType;
class DashboardContentTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $contentTypeId;

/**
* @var \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType
*/
public $contentType;

protected function loadModel() {
$this->tableName = "dashboard_content_type";
$this->aliasTableName = "dashboard_content_type";
$this->label = "DashboardContentType";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "dashboard_content_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "dashboard_content_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->contentTypeId->tableName = "dashboard_content_type";
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->aliasFieldName = "dashboard_content_type_content_type";
$this->contentTypeId->label = "Content Type";
$this->loadContentType();

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->addType($this->contentTypeId);

}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType($this, "dashboard_content_type_content_type");
$this->contentType->tableName = "dashboard_content_type";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "dashboard_content_type_content_type";
$this->contentType->label = "Content Type";
}
}
}