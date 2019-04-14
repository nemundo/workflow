<?php
namespace Nemundo\Workflow\App\Assignment\Data\AssignmentFilter;
class AssignmentFilterModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $filterLabel;

protected function loadModel() {
$this->tableName = "assignment_filter";
$this->aliasTableName = "assignment_filter";
$this->label = "AssignmentFilter";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "assignment_filter";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "assignment_filter_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->contentTypeId->tableName = "assignment_filter";
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->aliasFieldName = "assignment_filter_content_type";
$this->contentTypeId->label = "Content Type";

$this->filterLabel = new \Nemundo\Model\Type\Text\TextType($this);
$this->filterLabel->tableName = "assignment_filter";
$this->filterLabel->fieldName = "filter_label";
$this->filterLabel->aliasFieldName = "assignment_filter_filter_label";
$this->filterLabel->label = "Filter Label";
$this->filterLabel->allowNullValue = "";
$this->filterLabel->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->addType($this->contentTypeId);

}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType($this, "assignment_filter_content_type");
$this->contentType->tableName = "assignment_filter";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "assignment_filter_content_type";
$this->contentType->label = "Content Type";
}
return $this;
}
}