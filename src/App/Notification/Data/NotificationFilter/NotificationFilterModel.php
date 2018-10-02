<?php
namespace Nemundo\Workflow\App\Notification\Data\NotificationFilter;
class NotificationFilterModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
$this->tableName = "notification_filter";
$this->aliasTableName = "notification_filter";
$this->label = "Notification Filter";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "notification_filter";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "notification_filter_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->contentTypeId->tableName = "notification_filter";
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->aliasFieldName = "notification_filter_content_type";
$this->contentTypeId->label = "Content Type";
$this->loadContentType();

}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType($this, "notification_filter_content_type");
$this->contentType->tableName = "notification_filter";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "notification_filter_content_type";
$this->contentType->label = "Content Type";
}
}
}