<?php
namespace Nemundo\Workflow\App\Dashboard\Data\UserWidget;
class UserWidgetExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $widgetId;

/**
* @var \Nemundo\Workflow\App\Dashboard\Data\Widget\WidgetExternalType
*/
public $widget;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $itemOrder;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = UserWidgetModel::class;
$this->externalTableName = "dashboard_user_widget";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->userId = new \Nemundo\Model\Type\Id\IdType();
$this->userId->fieldName = "user";
$this->userId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userId->aliasFieldName = $this->userId->tableName ."_".$this->userId->fieldName;
$this->userId->label = "User";
$this->addType($this->userId);

$this->widgetId = new \Nemundo\Model\Type\Id\IdType();
$this->widgetId->fieldName = "widget";
$this->widgetId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->widgetId->aliasFieldName = $this->widgetId->tableName ."_".$this->widgetId->fieldName;
$this->widgetId->label = "Widget";
$this->addType($this->widgetId);

$this->itemOrder = new \Nemundo\Model\Type\Number\NumberType();
$this->itemOrder->fieldName = "item_order";
$this->itemOrder->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->itemOrder->aliasFieldName = $this->itemOrder->tableName . "_" . $this->itemOrder->fieldName;
$this->itemOrder->label = "Item Order";
$this->addType($this->itemOrder);

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType(null, $this->parentFieldName . "_user");
$this->user->fieldName = "user";
$this->user->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->user->aliasFieldName = $this->user->tableName ."_".$this->user->fieldName;
$this->user->label = "User";
$this->addType($this->user);
}
return $this;
}
public function loadWidget() {
if ($this->widget == null) {
$this->widget = new \Nemundo\Workflow\App\Dashboard\Data\Widget\WidgetExternalType(null, $this->parentFieldName . "_widget");
$this->widget->fieldName = "widget";
$this->widget->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->widget->aliasFieldName = $this->widget->tableName ."_".$this->widget->fieldName;
$this->widget->label = "Widget";
$this->addType($this->widget);
}
return $this;
}
}