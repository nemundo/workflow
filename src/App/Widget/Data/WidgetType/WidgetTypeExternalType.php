<?php
namespace Nemundo\Workflow\App\Widget\Data\WidgetType;
class WidgetTypeExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $widget;

/**
* @var \Nemundo\Model\Type\Php\PhpClassType
*/
public $widgetTypeClass;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = WidgetTypeModel::class;
$this->externalTableName = "widget_widget_type";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->widget = new \Nemundo\Model\Type\Text\TextType();
$this->widget->fieldName = "widget";
$this->widget->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->widget->aliasFieldName = $this->widget->tableName . "_" . $this->widget->fieldName;
$this->widget->label = "Widget";
$this->addType($this->widget);

$this->widgetTypeClass = new \Nemundo\Model\Type\Php\PhpClassType();
$this->widgetTypeClass->fieldName = "widget_type_class";
$this->widgetTypeClass->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->widgetTypeClass->aliasFieldName = $this->widgetTypeClass->tableName . "_" . $this->widgetTypeClass->fieldName;
$this->widgetTypeClass->label = "WidgetTypeClass";
$this->addType($this->widgetTypeClass);

}
}