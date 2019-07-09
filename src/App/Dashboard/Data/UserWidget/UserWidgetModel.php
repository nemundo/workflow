<?php
namespace Nemundo\Workflow\App\Dashboard\Data\UserWidget;
class UserWidgetModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $widgetId;

/**
* @var \Nemundo\Workflow\App\Dashboard\Data\Widget\WidgetExternalType
*/
public $widget;

protected function loadModel() {
$this->tableName = "dashboard_user_widget";
$this->aliasTableName = "dashboard_user_widget";
$this->label = "UserWidget";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "dashboard_user_widget";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "dashboard_user_widget_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "dashboard_user_widget";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "dashboard_user_widget_user";
$this->userId->label = "User";
$this->userId->allowNullValue = false;

$this->widgetId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->widgetId->tableName = "dashboard_user_widget";
$this->widgetId->fieldName = "widget";
$this->widgetId->aliasFieldName = "dashboard_user_widget_widget";
$this->widgetId->label = "Widget";
$this->widgetId->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->addType($this->userId);
$index->addType($this->widgetId);

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "dashboard_user_widget_user");
$this->user->tableName = "dashboard_user_widget";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "dashboard_user_widget_user";
$this->user->label = "User";
}
return $this;
}
public function loadWidget() {
if ($this->widget == null) {
$this->widget = new \Nemundo\Workflow\App\Dashboard\Data\Widget\WidgetExternalType($this, "dashboard_user_widget_widget");
$this->widget->tableName = "dashboard_user_widget";
$this->widget->fieldName = "widget";
$this->widget->aliasFieldName = "dashboard_user_widget_widget";
$this->widget->label = "Widget";
}
return $this;
}
}