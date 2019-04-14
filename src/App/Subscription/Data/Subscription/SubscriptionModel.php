<?php
namespace Nemundo\Workflow\App\Subscription\Data\Subscription;
class SubscriptionModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
* @var \Nemundo\Model\Type\Id\UniqueIdType
*/
public $dataId;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

protected function loadModel() {
$this->tableName = "subscription_subscription";
$this->aliasTableName = "subscription_subscription";
$this->label = "Subscription";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "subscription_subscription";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "subscription_subscription_id";
$this->id->label = "Id";
$this->id->allowNullValue = "";
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->contentTypeId->tableName = "subscription_subscription";
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->aliasFieldName = "subscription_subscription_content_type";
$this->contentTypeId->label = "Content Type";

$this->dataId = new \Nemundo\Model\Type\Id\UniqueIdType($this);
$this->dataId->tableName = "subscription_subscription";
$this->dataId->fieldName = "data_id";
$this->dataId->aliasFieldName = "subscription_subscription_data_id";
$this->dataId->label = "Data Id";
$this->dataId->allowNullValue = "";
$this->dataId->visible->form = false;
$this->dataId->visible->table = false;
$this->dataId->visible->view = false;
$this->id->visible->form = false;

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "subscription_subscription";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "subscription_subscription_user";
$this->userId->label = "User";

}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType($this, "subscription_subscription_content_type");
$this->contentType->tableName = "subscription_subscription";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "subscription_subscription_content_type";
$this->contentType->label = "Content Type";
}
return $this;
}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "subscription_subscription_user");
$this->user->tableName = "subscription_subscription";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "subscription_subscription_user";
$this->user->label = "User";
}
return $this;
}
}