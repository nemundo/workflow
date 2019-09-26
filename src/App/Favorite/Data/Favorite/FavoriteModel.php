<?php
namespace Nemundo\Workflow\App\Favorite\Data\Favorite;
class FavoriteModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
$this->tableName = "favorite_favorite";
$this->aliasTableName = "favorite_favorite";
$this->label = "Favorite";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "favorite_favorite";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "favorite_favorite_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->contentTypeId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->contentTypeId->tableName = "favorite_favorite";
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->aliasFieldName = "favorite_favorite_content_type";
$this->contentTypeId->label = "Content Type";
$this->contentTypeId->allowNullValue = false;
$this->loadContentType();

$this->dataId = new \Nemundo\Model\Type\Id\UniqueIdType($this);
$this->dataId->tableName = "favorite_favorite";
$this->dataId->fieldName = "data_id";
$this->dataId->aliasFieldName = "favorite_favorite_data_id";
$this->dataId->label = "Data Id";
$this->dataId->allowNullValue = false;
$this->dataId->visible->form = false;
$this->dataId->visible->table = false;
$this->dataId->visible->view = false;
$this->id->visible->form = false;

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "favorite_favorite";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "favorite_favorite_user";
$this->userId->label = "User";
$this->userId->allowNullValue = false;

}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeExternalType($this, "favorite_favorite_content_type");
$this->contentType->tableName = "favorite_favorite";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "favorite_favorite_content_type";
$this->contentType->label = "Content Type";
}
return $this;
}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "favorite_favorite_user");
$this->user->tableName = "favorite_favorite";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "favorite_favorite_user";
$this->user->label = "User";
}
return $this;
}
}